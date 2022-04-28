import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { getStorage } from 'src/services/storage';
import { ApiService } from 'src/app/api.service';



@Component({
  selector: 'app-user',
  templateUrl: './user.page.html',
  styleUrls: ['./user.page.scss'],
})
export class UserPage {

  islands;
  userid;
  username;


  constructor(
    private activatedRoute:ActivatedRoute,
    public  _apiService: ApiService

  ) {
    // get the data from the URL

    // this.activatedRoute.paramMap.subscribe(

    //   (data) => {

    //     console.log(data)

    //   }

    // );
    // this.data = this.activatedRoute.snapshot.paramMap.get('xyz');
    this.getDataStorage();
    this.showIslands();
   }
   async showIslands() {
      
    let data = {
      "key": "/owner",
      "value": "/" + await getStorage("id")
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
    // console.log(this.islands[0].image);

  }

  async getDataStorage(){
    this.userid = await getStorage('id');
    this.username = await getStorage('username');
  }  
}
