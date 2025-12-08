import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ProductosFullPage } from './productos-full.page';

const routes: Routes = [
  {
    path: '',
    component: ProductosFullPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ProductosFullPageRoutingModule {}
