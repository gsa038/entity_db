<?php

const DB_CREATE_QUERY = "CREATE DATABASE IF NOT EXISTS `entities`
                        DEFAULT CHARACTER SET utf8
                        DEFAULT COLLATE utf8_general_ci;

                        SET default_storage_engine = INNODB;

                        CREATE TABLE `entities`.`entities`(
                            `id` varchar(100) NOT NULL,
                            `type` varchar(100) NOT NULL,
                            'tags' json DEFAULT NULL,
                            'resources' json DEFAULT NULL,
                            PRIMARY KEY(`id`)
                        );";

const DB_DEMO_DATA_FILL_QUERY = "INSERT INTO `entities` (
                                    `id`, 
                                    `tags`, 
                                    `resources`
                                    )
                                VALUES(
                                    'host-name-10.gsa.ru' ,
                                    JSON_MERGE("SPB") ,
                                    JSOM_MERGE(
                                        '{ "CPU" : 1 }' ,
                                        '{ "RAM" : 2048 }' ,
                                        '{ "SSD" : 500 }' ,
                                        '{ "HDD" : 8000 }'
                                        )
                                    );
                                INSERT INTO `entities` (
                                    `id`, 
                                    `tags`, 
                                    `resources`
                                    )
                                VALUES(
                                    'host-name-20.gsa.ru' ,
                                    JSON_MERGE("SPB") ,
                                    JSOM_MERGE(
                                        '{ "CPU" : 2 }' ,
                                        '{ "RAM" : 4096 }' ,
                                        '{ "SSD" : 800 }' ,
                                        '{ "HDD" : 3000 }'
                                        )
                                );
                                INSERT INTO `entities` (
                                    `id`, 
                                    `tags`, 
                                    `resources`
                                    )
                                VALUES(
                                    'host-name-30.gsa.ru' ,
                                    JSON_MERGE("SPB") ,
                                    JSOM_MERGE(
                                        '{ "CPU" : 3 }' ,
                                        '{ "RAM" : 8172 }' ,
                                        '{ "SSD" : 1600 }' ,
                                        '{ "HDD" : 6000 }'
                                        )
                                );
                                INSERT INTO `entities` (
                                    `id`, 
                                    `tags`, 
                                    `resources`
                                    )
                                VALUES(
                                    'host-name-10.les.ru' ,
                                    JSON_MERGE("MSK") ,
                                    JSOM_MERGE(
                                        '{ "CPU" : 1 }' ,
                                        '{ "RAM" : 2048 }' ,
                                        '{ "SSD" : 500 }' ,
                                        '{ "HDD" : 8000 }'
                                        )
                                    );
                                INSERT INTO `entities` (
                                    `id`, 
                                    `tags`, 
                                    `resources`
                                    )
                                VALUES(
                                    'host-name-20.les.ru' ,
                                    JSON_MERGE("MSK") ,
                                    JSOM_MERGE(
                                        '{ "CPU" : 2 }' ,
                                        '{ "RAM" : 4096 }' ,
                                        '{ "SSD" : 800 }' ,
                                        '{ "HDD" : 3000 }'
                                        )
                                );
                                INSERT INTO `entities` (
                                    `id`, 
                                    `tags`, 
                                    `resources`
                                    )
                                VALUES(
                                    'host-name-30.les.ru' ,
                                    JSON_MERGE("MSK") ,
                                    JSOM_MERGE(
                                        '{ "CPU" : 3 }' ,
                                        '{ "RAM" : 8172 }' ,
                                        '{ "SSD" : 1600 }' ,
                                        '{ "HDD" : 6000 }'
                                        )
                                );";
const GET_ITEM_QUERY = "'SELECT {} from items;'";