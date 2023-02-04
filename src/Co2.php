<?php

namespace Ahoicloud\Co2;

use Exception;

class Co2
{
    const GIGABYTE = 1000 * 1000 * 1000;

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
    public function energyPerByteByComponent($bytes)
    {
        $transferedBytesToGb = $bytes / self::GIGABYTE;
        $energyUsage = $transferedBytesToGb * config('co2.KWH_PER_GB');

        // return the total energy, with breakdown by component
        return [
            'consumerDeviceEnergy' => $energyUsage * config('co2.END_USER_DEVICE_ENERGY'),
            'networkEnergy' => $energyUsage * config('co2.NETWORK_ENERGY'),
            'productionEnergy' => $energyUsage * config('co2.PRODUCTION_ENERGY'),
            'dataCenterEnergy' => $energyUsage * config('co2.DATACENTER_ENERGY'),
        ];
    }

  /**
   * Accept a figure for bytes transferred and return the number of kilowatt hours used
   * by the total system for this data transfer
   *
   * @param  float  $bytes
   * @return float the number of kilowatt hours used
   */
  public function energyPerByte(float $bytes)
  {
      $energyByComponent = $this->energyPerByteByComponent($bytes);

      // pull out our values…
      $energyValues = collect($energyByComponent);

      // so we can return their sum
      return $energyValues->sum();
  }

  /**
   * Accept an object keys by the different system components, and
   * return an object with the co2 figures key by the each component
   *
   * @param  array  $energyByComponent - energy grouped by the four system components
   * @param  bool  $carbonIntensity[] - carbon intensity to apply to the datacentre values
   * @return array the total number in grams of CO2 equivalent emissions
   */
  public function co2byComponent($energyByComponent, $carbonIntensity = false)
  {
      $deviceCarbonIntensity = config('co2.GLOBAL_GRID_INTENSITY');
      $networkCarbonIntensity = config('co2.GLOBAL_GRID_INTENSITY');
      $dataCenterCarbonIntensity = config('co2.GLOBAL_GRID_INTENSITY');

      $globalEmissions = config('co2.GLOBAL_GRID_INTENSITY');

      // If the user passes in a TRUE value (green web host), then use the renewables intensity value
      if ($carbonIntensity === true) {
          $dataCenterCarbonIntensity = config('co2.RENEWABLES_GRID_INTENSITY');
      } else {
          $dataCenterCarbonIntensity = config('co2.GLOBAL_GRID_INTENSITY');
      }

      $returnCO2ByComponent = [];
      foreach ($energyByComponent as $key => $value) {
          if (strpos($key, 'dataCenterEnergy') === 0) {
              $returnCO2ByComponent[str_replace('Energy', 'CO2', $key)] = $value * $dataCenterCarbonIntensity;
          } elseif (strpos($key, 'consumerDeviceEnergy') === 0) {
              $returnCO2ByComponent[str_replace('Energy', 'CO2', $key)] = $value * $deviceCarbonIntensity;
          } elseif (strpos($key, 'networkEnergy') === 0) {
              $returnCO2ByComponent[str_replace('Energy', 'CO2', $key)] = $value * $networkCarbonIntensity;
          } else {
              $returnCO2ByComponent[str_replace('Energy', 'CO2', $key)] = $value * $globalEmissions;
          }
      }

      return $returnCO2ByComponent;
  }

    /**
     * Accept a figure for bytes transferred and return a single figure for CO2
     * emissions. Where information exists about the origin data is being
     * fetched from, a different carbon intensity figure
     * is applied for the datacentre share of the carbon intensity.
     *
     * @param    $bytes - the data transferred in bytes
     * @param  bool  $carbonIntensity the carbon intensity for datacentre (average figures, not marginal ones)
     * @return float|null the total number in grams of CO2 equivalent emissions
     */
    public function perByte($bytes, $carbonIntensity = false, $segmentResults = false, $options = [])
    {
        $energyBycomponent = $this->energyPerByteByComponent($bytes);

        // otherwise when faced with non numeric values throw an error
        if (! is_bool($carbonIntensity)) {
            throw new Exception(
                'perByte expects a boolean for the carbon intensity value. Received: '.$carbonIntensity
            );
        }

        $co2ValuesbyComponent = $this->co2byComponent(
            $energyBycomponent,
            $carbonIntensity
        );

        // pull out our values…
        $co2Values = collect($co2ValuesbyComponent);
        $co2ValuesSum = $co2Values->sum();

        if ($segmentResults) {
            return null;
        }

        return $co2ValuesSum;
    }
}
