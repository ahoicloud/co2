<?php

use Ahoicloud\Co2\Co2;

const averageWebsiteInBytes = 2257715.2;
const MILLION = 1000000;
const MILLION_GREY = 0.35802;
const MILLION_GREEN = 0.31039;
const MILLION_GREY_DEVICES = 0.18617;
const MILLION_GREY_NETWORKS = 0.05012;
const MILLION_GREY_DATACENTERS = 0.0537;
const MILLION_GREEN_DATACENTERS = 0.006075;
const MILLION_GREY_PRODUCTION = 0.06802;

it('should return a array with numbers for each system component', function () {
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

it('should return a array for CO2 emissions', function () {
    $co2 = new Co2();

    expect($co2->energyPerByteByComponent(2257715.2))->toBeArray();
});
it("returns a CO2 number for data transfer", function () {
    $co2 = new Co2();
    expect(number_format($co2->perByte(MILLION), 5))->toBe(number_format(MILLION_GREY, 5));
});
it("returns a lower CO2 number for data transfer from domains using entirely 'green' power", function () {
    $co2 = new Co2();
    expect(number_format($co2->perByte(MILLION), 5))->toBe(number_format(MILLION_GREY, 5));
    expect(number_format($co2->perByte(MILLION, true), 5))->toBe(number_format(MILLION_GREEN, 5));
});

it("returns adjusted data center and total emissions for when green, other values remain the same as grey", function () {
    $co2 = new Co2();
    $co2_result_segements=$co2->perByte(MILLION,true,true);
    
    expect(number_format($co2_result_segements['consumerDeviceCO2'], 5))->toBe(number_format(MILLION_GREY_DEVICES, 5));
    expect(number_format($co2_result_segements['dataCenterCO2'], 6))->toBe(number_format(MILLION_GREEN_DATACENTERS, 6));
    expect(number_format($co2_result_segements['total'], 5))->toBe(number_format(MILLION_GREEN, 5));
});

it("returns an object with devices, networks, data centers, and production emissions shown separately, as well as the total emissions", function () {
    $co2 = new Co2();
    $co2_result_segements=$co2->perByte(MILLION,false,true);
    
    expect(number_format($co2_result_segements['consumerDeviceCO2'], 5))->toBe(number_format(MILLION_GREY_DEVICES, 5));
    expect(number_format($co2_result_segements['dataCenterCO2'], 5))->toBe(number_format(MILLION_GREY_DATACENTERS, 5));
    expect(number_format($co2_result_segements['networkCO2'], 5))->toBe(number_format(MILLION_GREY_NETWORKS, 5));
    expect(number_format($co2_result_segements['total'], 5))->toBe(number_format(MILLION_GREY, 5));
});
