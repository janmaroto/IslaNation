import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/api.service';
import { Router } from '@angular/router';
import { getStorage, removeStorage, setStorage } from '../../services/storage';



@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  constructor(
    public  _apiService: ApiService,
    private router: Router
  ) { }

  username;
  password;
  uuid;
  id;

  userLogin() {
    var data = {
      "user": this.username,
      "pass": this.password
    };

    this._apiService.userLogin(data).subscribe((response) => {
      console.log(response);
      setStorage('uuid', response['uuid']);
      setStorage('id', response['id']);
    });

    //this.router.navigate(['/home']

  }
  userLogOut() {
    this._apiService.logOut({"id": this.id}).subscribe((response) => {
      console.log(response);
    });
  }
  async getDataStorage(){
    this.uuid = await getStorage('uuid');
    this.id = await getStorage('id');
    console.log(this.uuid, this.id);

}
  

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})