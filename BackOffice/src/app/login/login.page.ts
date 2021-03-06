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

      if (response['uuid']) {
        setStorage('uuid', response['uuid']);
        setStorage('id', response['id']);
        setStorage('username', response['username']);
        setStorage('email', response['email']);
        this.router.navigate([`/user/${response['username']}`])

        } else {
          document.getElementById("pass-input").nextElementSibling.innerHTML = "Username or password are incorrect!";
        }
      

      // console.log(getStorage('uuid'));
    
    });

    console.log(data);

  }

  

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})