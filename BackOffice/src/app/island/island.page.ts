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
  island;
  islandId;
  mode;

  constructor(
    public  _apiService: ApiService,
    private route: ActivatedRoute,
    private router: Router

  ) {
    this.islandId = this.route.snapshot.paramMap.get("island");
    this.mode = this.route.snapshot.paramMap.get("mode");

    

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

  editIsland() {

  }
  
  deleteIsland() {
    
  }
  

  ngOnInit() {
    if (this.mode == 'detail') {
      this.getIslandData();
    } else if (this.mode == 'edit') {

    }
  }

}
