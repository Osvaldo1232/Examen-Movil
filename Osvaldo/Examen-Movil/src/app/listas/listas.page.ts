import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ModalPage } from '../components/modal/modal.page';
import { ServiciosApi } from '../Servicios/servicios-api';
import { Router } from '@angular/router';

@Component({
  selector: 'app-listas',
  templateUrl: './listas.page.html',
  styleUrls: ['./listas.page.scss'],
  standalone:false,
})
export class ListasPage implements OnInit {
 productos: any[] = [];
   ngOnInit() {
    this.lista();
  }
constructor(private modalCtrl: ModalController, private servicios: ServiciosApi,  private router: Router) {}


 lista(){
    this.servicios.productos180().subscribe(
      dato=>{
        this.productos=dato;
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
