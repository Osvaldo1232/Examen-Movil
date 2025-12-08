import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ProductosFullPageRoutingModule } from './productos-full-routing.module';

import { ProductosFullPage } from './productos-full.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ProductosFullPageRoutingModule
  ],
  declarations: [ProductosFullPage]
})
export class ProductosFullPageModule {}
