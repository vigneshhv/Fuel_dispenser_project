// include header file
#include <WiFi.h>
#include <WiFiClient.h>
#include <HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <ArduinoJson.h>
#include <ArduinoJson.hpp>
#include <WiFiClient.h>
#include <HTTPClient.h>

// const declarations
#define SS_PIN 5
#define RST_PIN 22

MFRC522 rfid(SS_PIN, RST_PIN);
const char* ssid = "surajsonu"; //--> Your wifi name or SSID.
const char* password = "svm@12345"; 

//setup
void setup(){
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password); 
  Serial.println("");
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println();
  SPI.begin();
  rfid.PCD_Init();
}
//loop
void loop(){
    String UID = "";
    HTTPClient http; 
    String  LinkGet, getData;
    const size_t capacity = JSON_OBJECT_SIZE(3) + 30;
    DynamicJsonDocument doc(capacity);
    const char* uid;
    int fuelamt;
    const char* fueltype  ;
    int ID;
    // if card read 
    if (rfid.PICC_IsNewCardPresent() && rfid.PICC_ReadCardSerial()){
    for (byte i = 0; i < rfid.uid.size; i++) {
      UID += (rfid.uid.uidByte[i] < 0x10 ? "0" : "");
      UID += String(rfid.uid.uidByte[i], HEX);
    } 
    Serial.println("");
    Serial.print("Card UID: ");
    Serial.println(UID);
    rfid.PICC_HaltA();
    rfid.PCD_StopCrypto1(); 
    //first api hit
    LinkGet = "https://192.168.29.10/fuel_dispenser/RFID_API.php"; 
    getData = "UID=" + UID;
    Serial.println("----------------first Connect to Server-----------------");
    Serial.println("Get LED Status from Server or Database");
    Serial.print("Request Link : ");
    Serial.println(LinkGet);
    http.begin(LinkGet); 
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    
    int httpCodeGet = http.POST(getData); 
    Serial.print("Response Code : ");  
    Serial.println(httpCodeGet);
    if(httpCodeGet>0){
    String response = http.getString();
    Serial.println(response);
    DeserializationError error = deserializeJson(doc, response);
    if (error) {
    Serial.print("deserializeJson() failed: ");
    Serial.println(error.c_str());
    }
    uid = doc["uid"];
    fuelamt= doc["fuelamt"];
    fueltype  = doc["fueltype"];
    ID=doc["ID"];
    //parsed
    Serial.println("Parsed JSON Response:");
    Serial.print("uid: ");
    Serial.println(uid);
    Serial.print("fuelamt: ");
    Serial.println(fuelamt);
    Serial.print("fueltype: ");
    Serial.println(fueltype);
    Serial.print("ID: ");
    Serial.println(ID);
    }
    Serial.println("----------------Closing Connection----------------");
    http.end(); //--> Close first connection

    // hit send the data to arduino 
    delay(5000);
    int status_flag=1;
    //sencond api hit
   LinkGet = "https://192.168.29.10/fuel_dispenser/Respnse_API.php"; 
   getData = "UID=" + UID+"&ID="+ID+"&status_flag="+status_flag;
   Serial.println("----------------Second Connect to Server-----------------");
   Serial.println("Get LED Status from Server or Database");
   Serial.print("Request Link : ");
   Serial.println(LinkGet);
   http.begin(LinkGet); 
   http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 
   httpCodeGet = http.POST(getData); 
   Serial.print("Response Code : ");  
   Serial.println(httpCodeGet);
   Serial.println("----------------Closing Connection----------------");
   http.end(); //--> Close 2nd hit connection
    } 
}
