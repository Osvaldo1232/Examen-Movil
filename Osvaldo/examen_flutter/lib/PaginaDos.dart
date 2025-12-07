import 'package:flutter/material.dart';

class PaginaDos extends StatefulWidget {
  const PaginaDos({super.key});

  @override
  State<PaginaDos> createState() => _PaginaDosState();
}

class _PaginaDosState extends State<PaginaDos> {
  final TextEditingController horasCtrl = TextEditingController();

  String turno = "Matutino"; // valor inicial
  double? total;

  void calcularPago() {
    final horas = double.tryParse(horasCtrl.text);

    if (horas == null) {
      ScaffoldMessenger.of(
        context,
      ).showSnackBar(const SnackBar(content: Text("Ingresa un número válido")));
      return;
    }

    double tarifa = turno == "Matutino" ? 30 : 35;

    setState(() {
      total = horas * tarifa;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Página Dos")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              "Cálculo por Turno",
              style: TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
            ),

            const SizedBox(height: 20),

            TextField(
              controller: horasCtrl,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: "Horas trabajadas",
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 20),

            const Text("Selecciona turno:", style: TextStyle(fontSize: 18)),

            DropdownButton<String>(
              value: turno,
              items: const [
                DropdownMenuItem(
                  value: "Matutino",
                  child: Text("Matutino (30/hr)"),
                ),
                DropdownMenuItem(
                  value: "Vespertino",
                  child: Text("Vespertino (35/hr)"),
                ),
              ],
              onChanged: (value) {
                setState(() {
                  turno = value!;
                });
              },
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: calcularPago,
              child: const Text("Calcular Pago"),
            ),

            const SizedBox(height: 20),

            if (total != null)
              Text(
                "Total a pagar: \$${total!.toStringAsFixed(2)}",
                style: const TextStyle(
                  fontSize: 24,
                  fontWeight: FontWeight.bold,
                ),
              ),
          ],
        ),
      ),
    );
  }
}
