import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { PrecioAsusPageRoutingModule } from './precio-asus-routing.module';

import { PrecioAsusPage } from './precio-asus.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    PrecioAsusPageRoutingModule
  ],
  declarations: [PrecioAsusPage]
})
export class PrecioAsusPageModule {}
