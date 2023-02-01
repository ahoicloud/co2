<?php

use Ahoicloud\Co2\Co2;

const averageWebsiteInBytes = 2257715.2;
it('should return a object with numbers for each system component', function () {
    // Compare these with the carbon intensity tab C7-C10.
    // https://docs.google.com/spreadsheets/d/1eFlHhSBus_HqmoXqX237eAYr0PREUhTr6YBxznQC4jI/edit#gid=0
    $co2 = new Co2();
    // These numbers should match the spreadsheet
    $groupedEnergy = $co2->energyPerByteByComponent(averageWebsiteInBytes);
    expect($groupedEnergy['consumerDeviceEnergy'])->toBe(0.0009509496422400002);
    expect($groupedEnergy['networkEnergy'])->toBe(0.00025602490368000007);
    expect($groupedEnergy['dataCenterEnergy'])->toBe(0.0002743123968);
    expect($groupedEnergy['productionEnergy'])->toBe(0.00034746236928000007);
});

it('should return a number in kilowatt hours for the given data transfer in bytes', function () {
    $co2 = new Co2();
    $energyForTransfer = $co2->energyPerByte(averageWebsiteInBytes);
    expect($energyForTransfer)->toBe(0.0018287493120000002);
});
it('should return a single number for CO2 emissions', function () {
    $co2 = new Co2();
    expect($co2->perByte(2257715.2))->toBeNumeric();
});
