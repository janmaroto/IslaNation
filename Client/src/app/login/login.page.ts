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
  password

  userLogin() {
    var data = new FormData();
    data.append("user", this.username);
    data.append("pass", this.password);
    this._apiService.userLogin(data).subscribe((response) => {
      console.log(response);
    });

  }

  ngOnInit() {
  }

}
