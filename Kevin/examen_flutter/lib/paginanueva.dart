import 'package:examen_flutter/PaginaDos.dart';
import 'package:flutter/material.dart';

class PaginaNueva extends StatefulWidget {
  const PaginaNueva({super.key});

  @override
  State<PaginaNueva> createState() => _PaginaNuevaState();
}

class _PaginaNuevaState extends State<PaginaNueva> {
  final TextEditingController horasCtrl = TextEditingController();
  final TextEditingController precioCtrl = TextEditingController();

  double? total;

  void calcular() {
    final horas = double.tryParse(horasCtrl.text);
    final precio = double.tryParse(precioCtrl.text);

    if (horas == null || precio == null) {
      ScaffoldMessenger.of(
        context,
      ).showSnackBar(const SnackBar(content: Text("Ingresa valores válidos")));
      return;
    }

    setState(() {
      total = horas * precio;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Nueva Pantalla")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            const Text(
              "Cálculo de pago",
              style: TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 20),

            /// Campo horas trabajadas
            TextField(
              controller: horasCtrl,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: "Horas trabajadas",
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 20),

            /// Campo precio por hora
            TextField(
              controller: precioCtrl,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: "Precio por hora",
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 20),

            ElevatedButton(onPressed: calcular, child: const Text("Calcular")),

            const SizedBox(height: 20),

            if (total != null)
              Text(
                "Total a pagar: \$${total!.toStringAsFixed(2)}",
                style: const TextStyle(
                  fontSize: 24,
                  fontWeight: FontWeight.bold,
                ),
              ),
            const SizedBox(height: 40),

            // 🔥 AQUI BOTÓN PARA IR A PAGINA DOS
            ElevatedButton(
              onPressed: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (_) => const PaginaDos()),
                );
              },
              style: ElevatedButton.styleFrom(backgroundColor: Colors.green),
              child: const Text("Ir a Página Dos"),
            ),
          ],
        ),
      ),
    );
  }
}
