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

  userLogin() {
    var data = {
      "user": this.username,
      "pass": this.password
    };

    this._apiService.userLogin(data).subscribe((response) => {
      console.log(response);
      setStorage('uuid', response['uuid']);
    });

    //this.router.navigate(['/home'])

  }
  async getDataStorage(){
    this.uuid = await getStorage('uuid');
    console.log(this.uuid);
}
  

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})