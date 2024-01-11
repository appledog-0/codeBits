import 'package:flutter/material.dart';
import 'package:flutter_map/flutter_map.dart';
import 'package:latlong/latlong.dart';
import 'package:geocoding/geocoding.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: MapApp(),
    );
  }
}

class MapApp extends StatefulWidget {
  @override
  _MapAppState createState() => _MapAppState();
}

class _MapAppState extends State<MapApp> {
  LatLng point = LatLng(49.5, -0.09);
  List<Placemark> location = [];

  @override
  Widget build(BuildContext context) {
    return Stack(
      children: [
        FlutterMap(
          options: MapOptions(
            onTap: (p) async {
              location =
                  await placemarkFromCoordinates(p.latitude, p.longitude);

              setState(() {
                point = p;
                print(p);
              });

              print(
                  "${location.first.country},${location.first.locality}, ${location.first.name}");
            },
            center: LatLng(49.5, -0.09),
            zoom: 5.0,
          ),
          layers: [
            TileLayerOptions(
              urlTemplate: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
              subdomains: ['a', 'b', 'c'],
            ),
            MarkerLayerOptions(
              markers: [
                Marker(
                  width: 80.0,
                  height: 80.0,
                  point: point,
                  builder: (ctx) => Container(
                    child: Icon(
                      Icons.location_on,
                      color: Colors.red,
                    ),
                  ),
                )
              ],
            ),
          ],
        ),
        Padding(
          padding: EdgeInsets.symmetric(horizontal: 16.0, vertical: 34.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Card(
                child: TextField(
                  decoration: InputDecoration(
                    contentPadding: EdgeInsets.all(16.0),
                    hintText: "Search for your location",
                    prefixIcon: Icon(Icons.location_on_outlined),
                  ),
                ),
              ),
              Card(
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Column(
                    children: [
                      Text(
                        "${location.isNotEmpty ? location.first.country : ''},${location.isNotEmpty ? location.first.locality : ''}, ${location.isNotEmpty ? location.first.name : ''}",
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ),
      ],
    );
  }
}
