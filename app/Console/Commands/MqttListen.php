<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use App\Models\SensorData;

class MqttListen extends Command
{
    protected $signature = 'mqtt:listen';

    protected $description = 'Mendengarkan data sensor dari MQTT Broker dan menyimpannya ke database';

    public function handle()
    {
        $server = 'broker.avisha.id';
        $port = 1883;
        $clientId = 'laravel-listener-' . uniqid();
        $username = 'cahyo';
        $password = 'Agus123.';
        $topic = 'cahyo';

        $mqtt = new MqttClient($server, $port, $clientId);

        $connectionSettings = (new ConnectionSettings)
            ->setUsername($username)
            ->setPassword($password)
            ->setKeepAliveInterval(60);

        $this->info("Menghubungkan ke MQTT Broker: {$server}:{$port} ...");

        $mqtt->connect($connectionSettings, true);

        $this->info("Berhasil terhubung! Mendengarkan topic: {$topic}");
        $this->info("Tekan Ctrl+C untuk berhenti.");

        $mqtt->subscribe($topic, function (string $topic, string $message) {

            $this->info("Data diterima dari topic [{$topic}]: {$message}");

            $data = json_decode($message, true);

            if ($data === null) {
                $this->error("Gagal parsing JSON, data dilewati.");
                return;
            }

            try {
                SensorData::create([
                    'device_id' => $data['device_id'] ?? 'esp8266-mqtt',
                    'suhu' => $data['suhu'] ?? null,
                    'kelembapan' => $data['kelembapan'] ?? null,
                    'jarak' => $data['jarak'] ?? null,
                ]);

                $this->info("Data berhasil disimpan ke database!");

            } catch (\Exception $e) {
                $this->error("Gagal menyimpan ke database: " . $e->getMessage());
            }

        }, 0);

        $mqtt->loop(true);
    }
}