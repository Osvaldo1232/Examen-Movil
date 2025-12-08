import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ServiciosApi } from '../Servicios/servicios-api';
import { Router } from '@angular/router';

@Component({
  selector: 'app-fabricantes',
  templateUrl: './fabricantes.page.html',
  styleUrls: ['./fabricantes.page.scss'],
  standalone:false,

})
export class FabricantesPage implements OnInit {

 fabricantes: any[] = [];
    ngOnInit() {
     this.lista();
   }
 constructor(private modalCtrl: ModalController, private servicios: ServiciosApi ,  private router: Router) {}
 
 
 lista() {
  this.servicios.fabricantes().subscribe(data => {

    const agrupados: any = {};

    data.forEach((item: any) => {
      const fab = item.fabricante;
      const prod = item.producto;

      if (!agrupados[fab]) {
        agrupados[fab] = {
          fabricante: fab,
          productos: []
        };
      }

      if (prod) {
        agrupados[fab].productos.push(prod);
      }
    });

    this.fabricantes = Object.values(agrupados);

    console.log("AGRUPADOS:", this.fabricantes);
  });
}


opcion1() {
    this.router.navigate(['/listas']);
  }

  opcion2() {
    this.router.navigate(['/fabricantes']);
  }

  opcion3() {
    this.router.navigate(['/productos-full']);
  }

  opcion4() {
    this.router.navigate(['/precio-asus']);
  }

}
