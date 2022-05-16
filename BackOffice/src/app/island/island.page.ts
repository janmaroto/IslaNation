import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { getStorage } from 'src/services/storage';
import { ApiService } from 'src/app/api.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-island',
  templateUrl: './island.page.html',
  styleUrls: ['./island.page.scss'],
})
export class IslandPage implements OnInit {
  islandName;
  islandDesc;
  islandCountry;
  islandSurface;
  islandPop;
  islandImage1;
  islandImage2;
  islandImage3;

  islandId;

  island;

  mode;

  countries;

  constructor(
    public  _apiService: ApiService,
    private route: ActivatedRoute,
    private router: Router

  ) {
    this.islandId = this.route.snapshot.paramMap.get("island");
    this.mode = this.route.snapshot.paramMap.get("mode");

    if (this.mode == 'detail') {
      this.getIslandData();
    } else if (this.mode == 'edit') {

    }
    
    this.getCountriesList();

    

    // console.log(this.island);
    console.log(this.mode);

  }

  getIslandData() {
      
    let data = {
      "key": "/id",
      "value": "/" + this.islandId
     };

      console.log(data);
      this._apiService.showFilteredIslands(data).subscribe((response) => {
        this.island = response[0];
        this.island.image = JSON.parse(this.island.images)[0];
        console.log(this.island);
        console.log(this.island.images);
      });
  }
  getCountriesList() {
    this._apiService.getCountriesList().subscribe((response) => {
      this.countries = response;
      console.log(response);
    });

  }

  async editIsland() {
    var data = new FormData();

    data.append("islandId", this.islandId);

    data.append("islandName", this.islandName);
    data.append("islandDesc", this.islandDesc);
    data.append("islandCountry", this.islandCountry);
    data.append("islandSurface", this.islandSurface);
    data.append("islandImage1", this.islandImage1);
    data.append("islandImage2", this.islandImage2);
    data.append("islandImage3", this.islandImage3);

    console.log(data);

    let x_api_key = await getStorage('uuid');


    this._apiService.editIsland(data, x_api_key).subscribe((response) => {
      console.log(response);
    });
  }
  
  deleteIsland() {
    
  }
  

  ngOnInit() {
  }

}
