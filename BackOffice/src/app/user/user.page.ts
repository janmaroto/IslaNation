import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { getStorage } from 'src/services/storage';
import { removeStorage } from 'src/services/storage';
import { ApiService } from 'src/app/api.service';
import { Router } from '@angular/router';




@Component({
  selector: 'app-user',
  templateUrl: './user.page.html',
  styleUrls: ['./user.page.scss'],
})
export class UserPage {

  user;
  islands;
  userid;
  username;


  constructor(
    public  _apiService: ApiService,
    private route: ActivatedRoute,
    private router: Router


  ) {
    this.user = this.route.snapshot.paramMap.get("user");

    this.getDataStorage();
    console.log(this.username);

    this.showIslands();
   }
   logOut() {
    removeStorage('uuid');
    removeStorage('id');
    removeStorage('username');
    removeStorage('email');
    this.router.navigate([`/home`])
   }
   showIslands() {
      
    let data = {
      "key": "/owner",
      "value": "/" + this.user
     };

      console.log(data);
      this._apiService.showFilteredIslands(data).subscribe((response) => {
        this.islands = response;
        console.log(response);
        this.islands.forEach(island => {
          island.image = JSON.parse(island.images)[0];
          console.log(island.image);
          
        });

      });
  }

  showIsland(island, mode) {
    console.log(island);
    console.log(mode);
    this.router.navigate(['/island/' + island + '/' + mode])

  }

  async getDataStorage(){
    this.userid = await getStorage('id');
    this.username = await getStorage('username');
  }  
}
