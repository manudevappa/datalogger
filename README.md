# datalogger
Things speak Data logger using PHP and Mysql


This solution is used when we have multiple sensors sending multiple paramters to Thingspeak cloud over HTTPS. 

Working: 
When the Sensor network's data is send to thingspeak each device can be identified using Unique keys. Here 
Here I used only One API and Send all Data to same API using Different Unique ID seperated with ,(Comma). When we reaading Json file it will be easy to decode the JSON object data with respect to Comma. 

The code is written for specific application (energy meter data) but it can be modified to other applications also.
