<?php
//Constants taken from https://github.com/thegreenwebfoundation/co2.js/blob/main/src/constants/index.js
// config for Ahoicloud/Co2
return [
    // SUSTAINABLE WEB DESIGN CONSTANTS
    // this refers to the estimated total energy use for the internet around 2000 TWh,
    // divided by the total transfer it enables around 2500 exabytes
    'KWH_PER_GB' =>  0.81,
    // these constants outline how the energy is attributed to
    // different parts of the system in the SWD model
    'END_USER_DEVICE_ENERGY' =>  0.52,
    'NETWORK_ENERGY' =>0.14,
    'DATACENTER_ENERGY' =>0.15,
    'PRODUCTION_ENERGY' =>0.19,
    // These carbon intensity figures https://ember-climate.org/data/data-explorer
    // - Global carbon intensity for 2021
    'GLOBAL_GRID_INTENSITY' =>442,
    'RENEWABLES_GRID_INTENSITY' =>50,

    // Taken from: https://gitlab.com/wholegrain/carbon-api-2-0/-/blob/master/includes/carbonapi.php

    'FIRST_TIME_VIEWING_PERCENTAGE' =>0.75,
    'RETURNING_VISITOR_PERCENTAGE' =>0.25,
    'PERCENTAGE_OF_DATA_LOADED_ON_SUBSEQUENT_LOAD' =>0.02,

];
