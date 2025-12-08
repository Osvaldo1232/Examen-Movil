import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ServiciosApi } from '../Servicios/servicios-api';
import { Router } from '@angular/router';

@Component({
  selector: 'app-precio-asus',
  templateUrl: './precio-asus.page.html',
  styleUrls: ['./precio-asus.page.scss'],
  standalone:false
})
export class PrecioAsusPage implements OnInit {
 productoMax: any = null; 

  constructor(private servicios: ServiciosApi, private router: Router) {}

  ngOnInit() {
    this.obtenerProductoMaximo();
  }

  obtenerProductoMaximo() {
    this.servicios.asus().subscribe(
      dato => {
        if (dato && dato.length > 0) {
          this.productoMax = dato[0];
        }
        console.log('Producto más caro ASUS:', this.productoMax);
      },
      error => {
        console.error('Error al obtener producto máximo:', error);
      }
    );
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
