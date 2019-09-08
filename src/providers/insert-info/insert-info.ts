import { Injectable } from '@angular/core';
import {Observable} from 'rxjs/Observable';
import {Http, Headers,RequestOptions} from '@angular/http';
// import {Http} from '@angular/http';
import 'rxjs/add/operator/map';

/*
  Generated class for the InsertInfoProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
 
var url = 'http://www.gpcinemas.com/shanmukha/androidAppApi/agentModule/';

@Injectable()
export class InsertInfoProvider {

  constructor(public http: Http) {
    // console.log('Hello InsertInfoProvider Provider');
  }

  public getInfo() {
      return Observable.create(observer => {
        // var subUrl = 'getRequestForInsertInfo.php';
        // var data = 'mobile='+credentials.mobile+'&password='+credentials.password;
        // var currentUrl = url+subUrl+data;
        // this.http.get(currentUrl).map(res => res.json()).subscribe(data => {
         
        //   observer.next(data);
        //   observer.complete();

        var subUrl = 'getInfo.php';
        //var data = 'mobile='+credentials.mobile+'&password='+credentials.password;
        var currentUrl = url+subUrl;
        this.http.get(currentUrl).map(res => res.json()).subscribe(data => {
          observer.next(data);
          observer.complete();
        })
       // if(this.posts['status'] == 'No login found')
    })
}
public insertData(formData,update){
  if (formData.authkey === null || formData.location === null || formData.theatre === null || formData.movie === null || formData.showId === null || formData.agentBeta === null) {
    return Observable.throw("Invalid form data");
  } else {
    return Observable.create(observer => {
       let subUrl = 'insertInfo.php';
       let params = formData; 
       params.update = update;
       console.log(params);
          //for form data
      //  let body = new FormData();
      //  body.append('agent_id', params.authkey);
      //  body.append('theatre_id', params.theatre);
      //  body.append('exhibitor_id', params.exhibitor);
      //  body.append('movie_id', params.movie);
      //  body.append('show_id', params.showId);
      //  body.append('show_date', params.date);
      //  body.append('class1_tickets', params.c1Tickets);
      //  body.append('class1_price', params.c1Price);
      //  body.append('class1_actual_price', params.c1DiffPrice);
      //  body.append('class2_tickets', params.c2Tickets);
      //  body.append('class2_price', params.c2Price);
      //  body.append('class2_actual_price', params.c2DiffPrice);
      //  body.append('class3_tickets', params.c3Tickets);
      //  body.append('username', params.c3Price);
      //  body.append('username', params.c3DiffPrice);
      //  body.append('username', params.c4Tickets);
      //  body.append('username', params.c4Price);
      //  body.append('username', params.c4DiffPrice);
      //  body.append('username', params.c5Tickets);
      //  body.append('username', params.c5Price);
      //  body.append('username', params.c5DiffPrice);
      //  body.append('agent_beta', params.agentBeta);
      //  console.log(body);
       let currentUrl = url+subUrl;

      //  let headers = new Headers({ 'Content-Type': 'application/json' });
      //  return this.http.post('http://api/v1/get_user',body,headers).map((res: Response) => res.json());
       
        var headers = new Headers();
        headers.append("Accept", 'application/json');
        headers.append('Content-Type', 'application/json' );
        let options = new RequestOptions({ headers: headers });
        this.http.post(currentUrl, params, options).map(res => res.json()).subscribe(data => {
        observer.next(data);
        observer.complete();
        console.log(data);
       }, error => {
        });
      });
  }

}
}