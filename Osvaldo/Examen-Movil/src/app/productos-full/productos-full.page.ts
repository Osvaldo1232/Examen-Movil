import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ServiciosApi } from '../Servicios/servicios-api';
import { Router } from '@angular/router';

@Component({
  selector: 'app-productos-full',
  templateUrl: './productos-full.page.html',
  styleUrls: ['./productos-full.page.scss'],
  standalone:false
})
export class ProductosFullPage implements OnInit {

   listas: any[] = [];
     ngOnInit() {
      this.lista();
    }
  constructor(private modalCtrl: ModalController, private servicios: ServiciosApi, private router: Router) {}
  
  
   lista(){
      this.servicios.productos().subscribe(
        dato=>{
          this.listas=dato;
          console.log(dato)
        }
      )
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
