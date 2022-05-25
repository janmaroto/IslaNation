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
  islandImg1;
  islandImg2;
  islandImg3;

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

    } else if (this.mode == 'edit') {

    }

    // this.islandImg = [];
    
    this.getIslandData();
    this.getCountriesList();

    // console.log(this.island);
    console.log(this.mode);

    

  }
  
  selectedFile(event, img){
    if (img = 1) this.islandImg1 = event.target.files[0];
    if (img = 2) this.islandImg2 = event.target.files[0];
    if (img = 3) this.islandImg3 = event.target.files[0];
  }

  getIslandData() {
      
    let data = {
      "key": "/id",
      "value": "/" + this.islandId
     };

      console.log(data);
      this._apiService.showFilteredIslands(data).subscribe((response) => {
        this.island = response[0];
        this.island.images = JSON.parse(this.island.images);

        this.islandName = this.island.name;
        this.islandDesc = this.island.description;
        this.islandCountry = this.island.country;
        this.islandSurface = this.island.surface;
        this.islandPop = this.island.population;
        // this.islandImg1 = this.island.images[0];
        // this.islandImg2 = this.island.images[1];
        // this.islandImg3 = this.island.images[2];

        console.log(this.island);

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
    data.append("islandImg1", this.islandImg1);
    data.append("islandImg2", this.islandImg2);
    data.append("islandImg3", this.islandImg3);

    console.log(data);

    let x_api_key = await getStorage('uuid');


    this._apiService.editIsland(data, x_api_key).subscribe((response) => {
      console.log(response);
    });
  }
  async deleteIsland() {
    var data = new FormData();

    data.append("island", this.islandId);

    console.log(data);

    let x_api_key = await getStorage('uuid');


    this._apiService.deleteIsland(data, x_api_key).subscribe((response) => {
      console.log(response);
    });
  }  

  ngOnInit() {
  }

}
