import 'package:flutter/material.dart';

class PaginaNueva extends StatefulWidget {
  const PaginaNueva({super.key});

  @override
  State<PaginaNueva> createState() => _PaginaNuevaState();
}

class _PaginaNuevaState extends State<PaginaNueva> {
  String tipoPoliza = "A";
  bool bebeAlcohol = false;
  bool usaLentes = false;
  bool tieneEnfermedad = false;

  final TextEditingController edadCtrl = TextEditingController();

  double? total;

  void calcular() {
    double base = (tipoPoliza == "A") ? 1200 : 950;

    double incremento = 0;

    if (bebeAlcohol) incremento += base * 0.10;
    if (usaLentes) incremento += base * 0.05;
    if (tieneEnfermedad) incremento += base * 0.05;

    final edad = int.tryParse(edadCtrl.text) ?? 0;

    if (edad > 40) {
      incremento += base * 0.20;
    } else {
      incremento += base * 0.10;
    }

    setState(() {
      total = base + incremento;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Seguro de Auto"), centerTitle: true),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: SingleChildScrollView(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              const Text(
                "Tipo de póliza:",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              Row(
                children: [
                  Radio(
                    value: "A",
                    groupValue: tipoPoliza,
                    onChanged: (value) {
                      setState(() {
                        tipoPoliza = value.toString();
                      });
                    },
                  ),
                  const Text("Cobertura amplia (A)"),
                ],
              ),
              Row(
                children: [
                  Radio(
                    value: "B",
                    groupValue: tipoPoliza,
                    onChanged: (value) {
                      setState(() {
                        tipoPoliza = value.toString();
                      });
                    },
                  ),
                  const Text("Daños a terceros (B)"),
                ],
              ),

              CheckboxListTile(
                title: const Text("¿Bebe alcohol?"),
                value: bebeAlcohol,
                onChanged: (value) {
                  setState(() {
                    bebeAlcohol = value!;
                  });
                },
              ),
              CheckboxListTile(
                title: const Text("¿Usa lentes?"),
                value: usaLentes,
                onChanged: (value) {
                  setState(() {
                    usaLentes = value!;
                  });
                },
              ),
              CheckboxListTile(
                title: const Text("¿Tiene enfermedad?"),
                value: tieneEnfermedad,
                onChanged: (value) {
                  setState(() {
                    tieneEnfermedad = value!;
                  });
                },
              ),

              TextField(
                controller: edadCtrl,
                keyboardType: TextInputType.number,
                decoration: const InputDecoration(labelText: "Edad"),
              ),

              const SizedBox(height: 25),

              Center(
                child: ElevatedButton(
                  onPressed: calcular,
                  child: const Text("Calcular costo"),
                ),
              ),

              const SizedBox(height: 20),

              if (total != null)
                Center(
                  child: Text(
                    "Costo total: \$${total!.toStringAsFixed(2)}",
                    style: const TextStyle(
                      fontSize: 22,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
            ],
          ),
        ),
      ),
    );
  }
}
