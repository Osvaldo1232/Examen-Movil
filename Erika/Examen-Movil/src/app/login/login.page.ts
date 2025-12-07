import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ServiciosApi } from '../Servicios/servicios-api';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
  standalone:false,

})
export class LoginPage implements OnInit {
user:any;
pass:any;
   constructor(private servicios:ServiciosApi, private route:Router) { }

  ngOnInit() {
  }
 

  logins(){
    this.servicios.getUser(this.user, this.pass).subscribe(
      dato=>{

        if(dato==null){
          this.route.navigate(['/login']);
}else{
  localStorage.setItem("user", this.user)
          this.route.navigate(['/login']);
          this.route.navigate(['/listas']);



}
      }
    )
  } 


  ini(){
    console.log("datos", this.user, "usuario", this.pass, "Contra")
          this.route.navigate(['/listas']);

  }
}
