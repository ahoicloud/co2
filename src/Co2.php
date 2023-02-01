<?php

namespace Ahoicloud\Co2;

class Co2
{
    const GIGABYTE = 1000* 1000 * 1000;
    /**
     * Accept a figure for bytes transferred and return an object representing
     * the share of the total enrgy use of the entire system, broken down
     * by each corresponding system component
     * Gets emission by Sustainable Web Design
     *   https://sustainablewebdesign.org/calculating-digital-emissions/.
     *
     * @param    $bytes
     * @return array containing the energy in kilowatt hours, keyed by system component
     */

    public function  energyPerByteByComponent($bytes){
        $transferedBytesToGb = $bytes / self::GIGABYTE;
        $energyUsage = $transferedBytesToGb * config('co2.KWH_PER_GB');
    
        // return the total energy, with breakdown by component
        return [
          "consumerDeviceEnergy"=> $energyUsage * config('END_USER_DEVICE_ENERGY'),
          "networkEnergy"=> $energyUsage * config('NETWORK_ENERGY'),
          "productionEnergy"=> $energyUsage * config('PRODUCTION_ENERGY'),
          "dataCenterEnergy"=> $energyUsage * config('DATACENTER_ENERGY'),
        ];
    }
}
