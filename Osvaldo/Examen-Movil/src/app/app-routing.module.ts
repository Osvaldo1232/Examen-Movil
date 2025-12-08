import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full'
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'listas',
    loadChildren: () => import('./listas/listas.module').then( m => m.ListasPageModule)
  },
  {
    path: 'modal',
    loadChildren: () => import('./components/modal/modal.module').then( m => m.ModalPageModule)
  },
  {
    path: 'fabricantes',
    loadChildren: () => import('./fabricantes/fabricantes.module').then( m => m.FabricantesPageModule)
  },
  {
    path: 'productos-full',
    loadChildren: () => import('./productos-full/productos-full.module').then( m => m.ProductosFullPageModule)
  },
  {
    path: 'precio-asus',
    loadChildren: () => import('./precio-asus/precio-asus.module').then( m => m.PrecioAsusPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
