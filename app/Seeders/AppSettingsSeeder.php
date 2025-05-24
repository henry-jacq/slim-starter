<?php

namespace App\Seeders;

use DateTime;
use App\Entity\Settings;
use App\Interfaces\SeederInterface;
use Doctrine\ORM\EntityManagerInterface;

class AppSettingsSeeder implements SeederInterface
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    public function run(): void
    {
        $settings = [
            ['keyName' => 'app_name', 'value' => 'Quark PHP'],
            ['keyName' => 'setup_complete', 'value' => 'true'],
            ['keyName' => 'maintenance_mode', 'value' => 'false'],
            ['keyName' => 'email_settings', 'value' => '{}'],
        ];

        foreach ($settings as $setting) {
            $existingSetting = $this->em->getRepository(Settings::class)
                ->findOneBy(['keyName' => $setting['keyName']]);

            if (!$existingSetting) {
                $newSetting = new Settings();
                $newSetting->setKeyName($setting['keyName']);
                $newSetting->setValue($setting['value']);
                $newSetting->setUpdatedAt(new DateTime());

                $this->em->persist($newSetting);
            }
        }

        $this->em->flush();

        echo "App Settings seeded successfully!\n";
    }
}
