import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PrecioAsusPage } from './precio-asus.page';

const routes: Routes = [
  {
    path: '',
    component: PrecioAsusPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class PrecioAsusPageRoutingModule {}
