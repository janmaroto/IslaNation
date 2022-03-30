import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/api.service';
import { Router } from '@angular/router';
import { getStorage, setStorage } from '../../services/storage';



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
  

  userLogin() {
    var data = {
      "user": this.username,
      "pass": this.password
    };

    this._apiService.userLogin(data).subscribe((response) => {
      console.log(response);
      setStorage('uuid', response['uuid']);
      setStorage('id', response['id']);
      setStorage('username', response['username']);
      setStorage('email', response['email']);

      console.log(getStorage('uuid'));
    
      this.router.navigate(['/home'])
    });

    // console.log("hola");

  }

  

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})