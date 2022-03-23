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
  password;
  email;
  

  userRegister() {
    var data = {
      "user": this.username,
      "pass": this.password,
      "email": this.email
    };

    this._apiService.userRegister(data).subscribe((response) => {
      console.log(response);
      setStorage('id', response['id']);
      setStorage('username', response['username']);
      setStorage('email', response['email']);
    
      this.router.navigate(['/login'])
    });

    console.log("hola");

  }

  

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})