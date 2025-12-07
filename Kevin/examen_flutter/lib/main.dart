import 'package:examen_flutter/paginanueva.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Calculadora',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
      ),
      home: const MyHomePage(title: 'Calculadora'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  final TextEditingController n1 = TextEditingController();
  final TextEditingController n2 = TextEditingController();

  double resultado = 0;

  void calcular(String operacion) {
    double num1 = double.tryParse(n1.text) ?? 0;
    double num2 = double.tryParse(n2.text) ?? 0;

    setState(() {
      switch (operacion) {
        case '+':
          resultado = num1 + num2;
          break;
        case '-':
          resultado = num1 - num2;
          break;
        case '*':
          resultado = num1 * num2;
          break;
        case '/':
          resultado = num2 != 0 ? num1 / num2 : 0;
          break;
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).colorScheme.inversePrimary,
        title: Text("Calculadora de Dos Dígitos"),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            TextField(
              controller: n1,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: "Número 1",
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 15),

            TextField(
              controller: n2,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: "Número 2",
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 25),

            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                ElevatedButton(
                  onPressed: () => calcular('+'),
                  child: const Text("+"),
                ),
                ElevatedButton(
                  onPressed: () => calcular('-'),
                  child: const Text("-"),
                ),
                ElevatedButton(
                  onPressed: () => calcular('*'),
                  child: const Text("×"),
                ),
                ElevatedButton(
                  onPressed: () => calcular('/'),
                  child: const Text("÷"),
                ),
              ],
            ),

            const SizedBox(height: 30),

            Text(
              "Resultado: $resultado",
              style: const TextStyle(fontSize: 28, fontWeight: FontWeight.bold),
            ),

            const SizedBox(height: 40),

            // 👉 BOTÓN NUEVO PARA IR A OTRA PANTALLA
            ElevatedButton(
              onPressed: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const PaginaNueva()),
                );
              },
              child: const Text("Ir a otra pantalla"),
            ),
          ],
        ),
      ),
    );
  }
}
