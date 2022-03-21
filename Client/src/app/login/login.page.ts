import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/api.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  constructor(
    public  _apiService: ApiService
  ) { }

  username;
  password;
  result;

  userLogin() {
    // var data = new FormData();
    // data.append("user", this.username);
    // data.append("pass", this.password);
    var data = {
      "user": this.username,
      "pass": this.password
    };
    var result;
    this._apiService.userLogin(data).subscribe((response) => {
      result = response;
      console.log(response);
    });
    this.result = result;
    console.log(this.result);

    // window.location.replace("/home");

  }

  ngOnInit() {
  }

}
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    document.getElementById('submit-button').click();
  }
})