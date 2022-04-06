const net = require("net")
var mysql = require('mysql');
const express = require('express');
const app = express();
var bodyParser = require('body-parser');
var cors = require('cors');
var hexToBinary = require('hex-to-binary');
const date = require('date-and-time');
const { toASCII } = require("punycode");



const server = net.createServer(socket => {
    var rcpstarttime1 = new Date();
    //console.log(rcpstarttime1.toLocaleString());
    var offset = new Date().getTime();
    var time = offset + 19800000;
    var timestamp = new Date(time);
    //console.log(offset);
    var datetime = date.format(rcpstarttime1, 'YYYY-MM-DD HH:mm:ss');
    //console.log(`@UTC+5:30,${datetime}#`);


    socket.on("data", data => {
        //set data time to machine
        socket.write(`@UTC+5:30,${datetime}#`);
        // console.log(data);
        var sensor = '';
        var sts = '';
 
        //buffer data to hex data in string convertion
        var dummyString6 = data.toString('hex');


        //taking starting bits 1-4 position
        var startBit = dummyString6.substring(0, 4);
        let buf1 = Buffer.from(startBit, "hex");
        let startBits = buf1.toString("utf8");

        //taking packet length 5-8 position
        var pl = dummyString6.substring(4, 8);
        // let packetLength = Buffer.from(pl, "hex");
        //let startBits = buf2.toString("utf8");
        //console.log(packetLength);
        //console.log(pl);

        //taking protocol number 9-12 position
        var pn = dummyString6.substring(8, 12);
        let buf3 = Buffer.from(pn, "hex");
        let protocolNumber = buf3.toString("utf8");
        // console.log(protocolNumber);

        //taking hardware type 13-16 position
        var hardwaretype = dummyString6.substring(12, 16);
        //console.log(hardwaretype);

        //taking firmare version 17-22 position
        var firmware = dummyString6.substring(16, 24);

        //taking IMEI version 25-40 position
        var imei = dummyString6.substring(24, 40);

        //taking IMEI version 25-40 position
        var rct = dummyString6.substring(40, 52);

        //taking status data length 53-56 position
        var statusdata = dummyString6.substring(52, 56);

        //taking alarm type version 57-58 position
        var alarm = dummyString6.substring(56, 58);

        //taking wifi signal  61-62 position
        var wifi = dummyString6.substring(60, 62);

        //taking wifi status signal  63-64 position
        var wifistatus = dummyString6.substring(62, 64);




        //taking packet index to send ACK from 77-80 position
        var packetIndex = dummyString6.substring(76, 80);
        var decPacketIndex = parseInt(packetIndex, 16);
        //sending ACK to machine
        socket.write("@ACK," + decPacketIndex + "#");

        //taking terminal information data at 59-60 postion
        var termInfo = dummyString6.substring(58, 60);
        var binaryTermInfo = hexToBinary(termInfo);
        var termInfoData = binaryTermInfo.substring(0, 5);
        // for (i = 0; i < 6; i++) {
        //     var ti = binaryTermInfo[i];
        //     console.log(ti);
        //     if (i == 0) {
        //         if (ti == 0) {

        //         } else {

        //         }
        //     }
        // }
        //taking battery voltage data at 65-68 postion
        var bvoltage = dummyString6.substring(64, 68);
        var bv = parseInt(bvoltage, 16).toString(10);
        var batteryvoltage = bv * 0.01;
        //console.log(batteryvoltage);


        //taking temperature data at 69-72 postion
        var temp = dummyString6.substring(68, 72);


        var decTemp = hexToBinary(temp);

        //check temperature normal or abnormal
        var sensorNormal = decTemp[0];
        if (sensorNormal == 0) {
            sensor = 'normal';
        } else {
            sensor = 'abnormal';
        }

        //check temperature positive or negetive
        var status = decTemp[1];
        if (status == 1) {
            sts = '-';
        } else {
            sts = '+';
        }

        //the real temp data from 0 - 13 bytes (binary data)
        var tempReal1 = decTemp.substring(2, decTemp.length);
        var tempReal = tempReal1.toString();
        var hexdata = parseInt(tempReal, 2).toString(10);
        var tempCelcius = hexdata * 0.1;


        //taking humidity data at 74-76 postion
        var hum = dummyString6.substring(72, 76);

      
          //taking humidity data at 74-76 postion
        var crc = dummyString6.substring(80, 84);

         //taking humidity data at 74-76 postion
         var stopbits = dummyString6.substring(84, 88);

        //DB connection and insert data
        var con = mysql.createConnection({
            host: "localhost",
            user: "root",
            password: "Mukunda@123",
            database: "test"
        });

        con.connect(function (err) {
            if (err) {
                // device.publish(`response/${SLN}`, JSON.stringify({ "SLN": SLN, "timestamp": timestamp, "status": "0" }));
                throw err;
            }
            // console.log("Connected!");
            //var sql = "INSERT INTO rcpdata( time, SLN, `ptype`, `macid`, `rcptype`, `rcpname`, `rcpstarttime`, `rcpendtime`,`rcpercd`, `finalop`, `rc`,`appname`,`cookingtype`,`timestamp`) VALUES (time, 'SLN', 'PType','MACID','Rcpcry','Rcpnme','rcpstarttime','rcpendtime','Rcpercd','Fnlop',RC,'appName','cooktype','timestamp')";
            var sql = "INSERT INTO tcpdata( timestamp,data,temp,battery_voltage,terminalInfo,startbits,packetlength,protocolnumber,hardwaretype, firmware,imei,rct,status_data_length,alarm_type,wifi,wifistatus,humidity,packetindex,crc,stopbits) VALUES ?";
            var values = [
                [timestamp, data, tempCelcius, batteryvoltage, termInfoData, startBits, pl, protocolNumber, hardwaretype, firmware, imei, rct, statusdata, alarm, wifi, wifistatus,hum,packetIndex,crc,stopbits],

            ];
            con.query(sql, [values], function (err, result) {
                // console.log(err);
                if (err) {
                    //device.publish(`response/${SLN}`, JSON.stringify({ "SLN": SLN, "timestamp": timestamp, "status": "0" }));
                    throw err;
                }

                //console.log("1 record inserted");
            });
            con.end();
        })

    })
})

server.listen(8082)