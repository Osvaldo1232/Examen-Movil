import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ServiciosApi {


   private baseUrl="http://localhost/Servicios"
  constructor(private http: HttpClient){}
  getUser(user:any,pass:any) : Observable<any>{
    return this.http.get(`${this.baseUrl}/login.php?user=${user}&pass=${pass}`);
  }
  getUser1(user:any,pass:any) : Observable<any>{
    return this.http.get(`${this.baseUrl}/login1.php?user=${user}&pass=${pass}`);

  }

  addPresion(data:any):Observable<any>{
    return this.http.post(`${this.baseUrl}/addpresion.php`, data);
  }


   addJornada(data:any):Observable<any>{
    return this.http.post(`${this.baseUrl}/addjornada.php`, data);
  }


   upJornada(data:any):Observable<any>{
    return this.http.post(`${this.baseUrl}/mojornada.php`, data);
  }
   upPresion(data:any):Observable<any>{
    return this.http.post(`${this.baseUrl}/mopresion.php`, data);
  }

   delPresion(user:any, fecha:any):Observable<any>{
    return this.http.get(`${this.baseUrl}/delpresion.php?usuario=${user}&fecha=${fecha}`);
  }

    delPresion1(user:any):Observable<any>{
    return this.http.get(`${this.baseUrl}/deljornada.php?id=${user}`);
  }


    listaPresion(user:any):Observable<any>{
    return this.http.get(`${this.baseUrl}/listapresiones.php?usuario=${user}`);
  }

   listaJornadas(user:any):Observable<any>{
    return this.http.get(`${this.baseUrl}/listajornadas.php?usuario=${user}`);
  }
    buscarPresion(user:any, fecha:any):Observable<any>{
    return this.http.get(`${this.baseUrl}/buscarpresiones.php?usuario=${user}&fecha=${fecha}`);
  }


  // inician servicio snuevo

   productos180():Observable<any>{
    return this.http.get(`${this.baseUrl}/consulta1.php`);
  }

     fabricantes():Observable<any>{
    return this.http.get(`${this.baseUrl}/consulta2.php`);
  }

     productos():Observable<any>{
    return this.http.get(`${this.baseUrl}/consulta3.php`);
  }

    asus():Observable<any>{
    return this.http.get(`${this.baseUrl}/consulta4.php`);
  }
}
