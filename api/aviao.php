<?php
    require_once 'chaves.php';
    //retorna o menor preco para uma determinada rota dentor d 1 ano ou 1 mes
    //cabine pode ser 'economy' 'premiumEcononmy'...
    //format pode ser json ou xml
    //https://developer.ba.com/io-docs
    function menorPreco($origem, $destino, $cabine, $tipo, $range, $formato){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/flightOfferBasic;departureCity='.$origem
        .';arrivalCity='.$destino.';cabin='.$cabine.';journeyType='.$tipo.';range='.$range.'.'.$formato);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: 79hzmmeae79pbh47gccrymmr'));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    }
    
    function destinos(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/balocations');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: '.$chaveAviao));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    
    }
    
    
    
    function respostaMenorPreco(){
        //menorPreco('LON', 'NYC', 'economy', 'roundTrip', 'yearLow', 'json');
        return '{"PricedItinerariesResponse":{"PricedItinerary":{"DepartureCity":"London",
        "DepartureCityCode":"LON","ArrivalCity":"New York","ArrivalCityCode":"NYC","Cabin":
            "economy","TravelMonth":"OCT","JourneyType":"roundtrip","Price":{"Amount":
                {"Amount":434.65,"CurrencyCode":"GBP"},"IsTaxIncluded":true}}}}';
        //TODO: retornar um objeto com as ifnos de DepartureCity em diante
    }
    
    function respostaCertaNaoMexeNissoVouTeMatar(){
        return '{
    "OTA_AirLowFareSearchRS": {
        "Success": "",
        "PricedItineraries": {
            "PricedItinerary": [{
                "@SequenceNumber": "1",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T11:05:00",
                                "@DepartureDateTime": "2016-08-22T08:30:00",
                                "@FlightNumber": "117",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "2",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T12:10:00",
                                "@DepartureDateTime": "2016-08-22T09:40:00",
                                "@FlightNumber": "175",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "3",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T13:00:00",
                                "@DepartureDateTime": "2016-08-22T10:15:00",
                                "@FlightNumber": "1516",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "772"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "4",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T13:55:00",
                                "@DepartureDateTime": "2016-08-22T11:20:00",
                                "@FlightNumber": "173",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "5",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T15:50:00",
                                "@DepartureDateTime": "2016-08-22T13:10:00",
                                "@FlightNumber": "177",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "6",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T17:20:00",
                                "@DepartureDateTime": "2016-08-22T14:30:00",
                                "@FlightNumber": "115",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "7",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T18:05:00",
                                "@DepartureDateTime": "2016-08-22T15:15:00",
                                "@FlightNumber": "1506",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "772"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "8",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T18:55:00",
                                "@DepartureDateTime": "2016-08-22T16:15:00",
                                "@FlightNumber": "113",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "9",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T20:05:00",
                                "@DepartureDateTime": "2016-08-22T17:15:00",
                                "@FlightNumber": "1510",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "77W"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "10",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T21:00:00",
                                "@DepartureDateTime": "2016-08-22T18:10:00",
                                "@FlightNumber": "179",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "11",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T22:20:00",
                                "@DepartureDateTime": "2016-08-22T19:30:00",
                                "@FlightNumber": "1593",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "772"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "12",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T22:45:00",
                                "@DepartureDateTime": "2016-08-22T20:05:00",
                                "@FlightNumber": "183",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }]
        }
    }
}
';
    }
    
    function paisesDestino($json){
        $destinos = json_decode($json, true);
        $aux = $destinos[GetBA_LocationsResponse][Country];
        $retorno = array();
        foreach ($aux as $country){
            array_push($retorno, $country[CountryName]."(".$country[CountryCode].")");
        }
        return $retorno;
    } 
    
    //exemplo horario: 2016-08-22T00:00:00-03:00
    function procuraPassagem($horario, $origem, $destino, $cabine, $numeroAdultos, $numeroCriancas, $numeroInfantil){
        $ch = curl_init();
        $url ='https://api.ba.com/rest-v1/v1/flightOfferMktAffiliates;departureDateTimeOutbound='.$horario.';locationCodeOriginOutbound='.$origem.';locationCodeDestinationOutbound='.$destino.';cabin='.$cabine.';ADT='.$numeroAdultos.';CHD='.$numeroCriancas.';INF='.$numeroCriancas.';format=.json';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: 79hzmmeae79pbh47gccrymmr'));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    }
?>