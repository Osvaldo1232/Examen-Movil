import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FabricantesPageRoutingModule } from './fabricantes-routing.module';

import { FabricantesPage } from './fabricantes.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FabricantesPageRoutingModule
  ],
  declarations: [FabricantesPage]
})
export class FabricantesPageModule {}
