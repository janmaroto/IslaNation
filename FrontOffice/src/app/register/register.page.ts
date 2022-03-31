import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/api.service';
import { Router } from '@angular/router';
import { getStorage, setStorage } from '../../services/storage';



@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {

  constructor(
    public  _apiService: ApiService,
    private router: Router
  ) { }

  username;
  email;
  password;
  avatar;
  
  signUp() {
    var data = {
      "user": this.username,
      "email": this.email,
      "pass": this.password,
      "pic": this.avatar
    };
    console.log("aquí" + data);
    this._apiService.signUp(data).subscribe((response) => {
      console.log("--");
      console.log(response);
    });

  }

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})