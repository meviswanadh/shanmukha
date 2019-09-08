import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, LoadingController, Loading, ToastController  } from 'ionic-angular';
import { InsertInfoProvider } from '../../providers/insert-info/insert-info';
import { CheckSessionProvider } from '../../providers/check-session/check-session';

import { LoginPage } from '../login/login';

/**
 * Generated class for the InsertInfoPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-insert-info',
  templateUrl: 'insert-info.html',
})

export class InsertInfoPage {
  update: string;
  authKey: any;
  auth: any;
  loading: Loading;
  locations:any[];
  optionsList:any[];
  formData = {};
  shows = [{id:1,name:"Morning Show"},{id:2,name:"Noon Show"},{id:3,name:"First Show"},{id:4,name:"Second Show"},{id:5,name:"Special Show"}];
  constructor(private toastCtrl: ToastController, public navCtrl: NavController, public navParams: NavParams, public insertInfo: InsertInfoProvider, public alertCtrl: AlertController, public loadingCtrl: LoadingController, public session: CheckSessionProvider) {
    this.authKey = navParams.get("authKey");
    this.formData = {"agent_id": navParams.get("authKey"),"update":"no"};
  }

  ionViewDidEnter(){

// if(localStorage.getItem("session") !== null){
  this.showLoading();
  this.insertInfo.getInfo().subscribe(allowed => {
    //this.loading.dismiss();
    if (allowed.status == 'Success') {   
      // this.showError(allowed);     
      // this.nav.push(HomePage);
      this.optionsList = allowed.data;
      this.locations = allowed.locations;
      // console.log(this.locations);
   // this.navCtrl.setRoot(InsertInfoPage); 
   this.loading.dismiss();
    } else {
      this.loading.dismiss();
      console.log(allowed);
      this.showError(allowed);
    }
  },
    error => {
      this.loading.dismiss();
      this.showError('error');
   });
// }
// else{
//   localStorage.clear();
//   this.navCtrl.setRoot(LoginPage);
// }

    //  this.showLoading();
    // this.session.getSession().subscribe(allowed => {
    // var oldSessionTime : number = <number> <any> localStorage.getItem("session");
    // var newSessionTime : number = <number> <any> allowed.session;
    // var diffSessionTime : number = newSessionTime - oldSessionTime;
    // // console.log('oldSessionTime ',typeof oldSessionTime);
    // // console.log('newSessionTime ',typeof newSessionTime);
    // // console.log('diffSessionTime ',typeof diffSessionTime);
    // // console.log(diffSessionTime);
    //   if (localStorage.getItem("session") === null || diffSessionTime > 60) { 
    //     this.showSessionError();    
    //     localStorage.clear();
    //     this.navCtrl.setRoot(LoginPage);    
    //   } else {
    //     // this.loading.dismiss();
    //     window.localStorage.setItem('session',allowed.session);
    //   }
    // },
    //   error => {
    //     this.showError('error');
    //  });
  }


  ionViewDidLoad() {
    // // if(localStorage.getItem("session") !== null){
    //   this.showLoading();
    //   this.insertInfo.getInfo().subscribe(allowed => {
    //     //this.loading.dismiss();
    //     if (allowed.status == 'Success') {   
    //       // this.showError(allowed);     
    //       // this.nav.push(HomePage);
    //       this.optionsList = allowed.data;
    //       this.locations = allowed.locations;
    //       // console.log(this.locations);
    //    // this.navCtrl.setRoot(InsertInfoPage); 
    //     } else {
    //       console.log(allowed);
    //       this.showError(allowed);
    //     }
    //   },
    //     error => {
    //       this.showError('error');
    //    });
    //    this.loading.dismiss();
    // // }
    // // else{
    // //   localStorage.clear();
    // //   this.navCtrl.setRoot(LoginPage);
    // // }
  }

  storeData(){
    // console.log(JSON.stringify(this.formData));
    // this.auth = this.formData.agent_id;
    this.showLoading();
    this.insertInfo.insertData(this.formData,this.update).subscribe(allowed => {
      console.log(allowed);
      if (allowed.status == 'record inserted successfully') {        
        // this.nav.push(HomePage);
       //  window.localStorage.setItem('userName',allowed.status);
     this.presentToast();
     this.navCtrl.setRoot(InsertInfoPage, {authKey:this.authKey}); 
    //this.loading.dismiss();
      console.log(allowed);
       // this.showErr(allowed);
       } else if (allowed.status == 'Do you want to update the show data') {        
        // this.nav.push(HomePage);
       //  window.localStorage.setItem('userName',allowed.status);
    //  this.navCtrl.setRoot(InsertInfoPage, {authKey:this.authKey}); 
      
    // this.presentPrompt();

     this.presentConfirm();
    //  this.navCtrl.setRoot(InsertInfoPage, {authKey:this.authKey}); 
      // this.loading.dismiss();
      // console.log(allowed);
       // this.showErr(allowed);
       } 
       else {
        this.showErr(allowed);
      }
    },
      error => {
        this.showError('error');
     });
  }

  signOut(){
    localStorage.clear();
    this.navCtrl.setRoot(LoginPage);
  }
  showLoading() {
    this.loading = this.loadingCtrl.create({
      content: 'Please wait...',
     // dismissOnPageChange: true
    });
    this.loading.present();
    setTimeout(() => {
      this.loading.dismiss();
    }, 3000);
  }
  dismissLoading(){
    this.loading.dismiss();
  }
  showError(allowed) {
     //
    let alert = this.alertCtrl.create({
      title: allowed.title,
      subTitle: allowed.subTitle,
      buttons: ['OK']
    });
    alert.present();
  }
  showErr(allowed) {
     //
    let alert = this.alertCtrl.create({
      // title: allowed.title,
      subTitle: allowed.status,
      buttons: ['OK']
    });
    alert.present();
    this.loading.dismiss();
  }
  showSessionError() {
   // this.loading.dismiss();
    let alert = this.alertCtrl.create({
      title: 'Error',
      subTitle: 'session expired' ,
      buttons: ['OK']
    });
    alert.present();
  }
  presentToast() {
    let toast = this.toastCtrl.create({
      message: 'Record added successfully',
      duration: 5000,
      position: 'bottom'
    });
  
    toast.onDidDismiss(() => {
      console.log('Dismissed toast');
    });
  
    toast.present();
  }

  presentConfirm() {
    let alert = this.alertCtrl.create({
      title: 'Confirm update',
      message: 'Do you want to update record ?',
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          handler: () => {
            console.log('Cancel clicked');
          }
        },
        {
          text: 'Update',
          handler: () => {
            this.update = "yes";
          }
        }
      ]
    });
    alert.present();
  }

// check box alert
presentPrompt() {
  let alert = this.alertCtrl.create({
    title: 'Update',
    inputs: [
      {
        type: 'checkbox',
        name: 'update',
        label:'Do You want to update'
      }
    ],
    buttons: [
      {
        text: 'Update',
        role: 'cancel',
        handler: data => {
          if (data.update) {
           this.update = "yes";
          } else {
            // invalid login
            return false;
          }
        }
      }
    ]
  });
  alert.present();
}  
}
