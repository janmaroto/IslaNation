import { Component } from '@angular/core';
import { getStorage } from 'src/services/storage';
import { ApiService } from 'src/app/api.service';


@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  uuid;
  islands;

  constructor(
    public  _apiService: ApiService
  ) {

    this.getDataStorage();
    this.showIslands();

  }

  showIslands() {
    this._apiService.showAllIslands("").subscribe((response) => {
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
    this.uuid = await getStorage('uuid');
    console.log("---------->" + this.uuid);
  }


}
