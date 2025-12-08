import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FabricantesPage } from './fabricantes.page';

const routes: Routes = [
  {
    path: '',
    component: FabricantesPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FabricantesPageRoutingModule {}
