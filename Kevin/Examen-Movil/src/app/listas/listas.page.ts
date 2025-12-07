import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ModalPage } from '../components/modal/modal.page';

@Component({
  selector: 'app-listas',
  templateUrl: './listas.page.html',
  styleUrls: ['./listas.page.scss'],
  standalone:false,
})
export class ListasPage implements OnInit {

   ngOnInit() {
  }
constructor(private modalCtrl: ModalController) {}

async abrirModal() {
  const modal = await this.modalCtrl.create({
    component: ModalPage
  });
  return await modal.present();
}
}
