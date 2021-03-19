<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /**
     @test
     */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake([
           "https://api.igdb.com/v4/games" => $this->fakeSingleGame()
        ]);

        $response = $this->get(route('games.show', 'fake-little-nightmares-ii'));

        $response->assertSuccessful();

        //general info
        $response->assertSee('Fake Little Nightmares II');
        $response->assertSee('90');
        $response->assertSee('82');
        $response->assertSee('PC');
        $response->assertSee('XONE');
        $response->assertSee('PS4');
        $response->assertSee('PS5');
        $response->assertSee('Stadia');
        $response->assertSee('Series X');
        $response->assertSee('Switch');
        $response->assertSee('Bandai Namco Entertainment');
        $response->assertSee('https://twitter.com/LittleNights');
        $response->assertSee('images.igdb.com/igdb/image/upload/t_cover_big/co1p7d.jpg');

        //screenshot
        $response->assertSee('images.igdb.com/igdb/image/upload/t_screenshot_big/sc6wcs.jpg');

        //similar game
        $response->assertSee('The Sinking City');
        $response->assertSee('images.igdb.com/igdb/image/upload/t_cover_big/co1l7s.jpg');


    }

    private function fakeSingleGame() {

        return  Http::response([
        0 =>  [
        "id" => 121760,
        "aggregated_rating" => 82.230769230769,
        "cover" => [
                "id" => 79321,
          "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1p7d.jpg",
        ],
        "first_release_date" => 1613001600,
        "genres" =>  [
                0 =>  [
                "id" => 8,
            "name" => "Platform",
          ],
          1 => [
                "id" => 9,
            "name" => "Puzzle",
          ],
          2 =>  [
                "id" => 31,
            "name" => "Adventure",
          ],
        ],
        "involved_companies" => [
            0 => [
            "id" => 120994,
            "company" =>  [
                "id" => 248,
              "name" => "Bandai Namco Entertainment",
            ],
          ],
          1 => [
                "id" => 120995,
            "company" => [
                "id" => 747,
              "name" => "Tarsier Studios",
            ],
          ],
        ],
        "name" => "Fake Little Nightmares II",
        "platforms" => [
                0 => [
                "id" => 6,
            "abbreviation" => "PC",
          ],
          1 => [
                "id" => 48,
            "abbreviation" => "PS4",
          ],
          2 => [
                "id" => 49,
            "abbreviation" => "XONE",
          ],
          3 => [
                "id" => 130,
            "abbreviation" => "Switch",
          ],
          4 => [
                "id" => 167,
            "abbreviation" => "PS5",
          ],
          5 => [
                "id" => 169,
            "abbreviation" => "Series X",
          ],
          6 =>  [
                "id" => 170,
            "abbreviation" => "Stadia",
          ]
        ],
        "rating" => 89.686582880363,
        "screenshots" => [
                0 => [
                "id" => 321868,
            "alpha_channel" => false,
            "animated" => false,
            "game" => 121760,
            "height" => 628,
            "image_id" => "sc6wcs",
            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc6wcs.jpg",
            "width" => 1200,
            "checksum" => "fde40ac9-a7ff-49a5-6e73-fe682b43342a",
          ],
          1 => [
                "id" => 321869,
            "alpha_channel" => false,
            "animated" => false,
            "game" => 121760,
            "height" => 336,
            "image_id" => "sc6wct",
            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc6wct.jpg",
            "width" => 800,
            "checksum" => "3d6342a3-2b46-9c88-401f-acbbfa98bacd",
          ],
          2 =>[
                "id" => 321871,
            "alpha_channel" => false,
            "animated" => false,
            "game" => 121760,
            "height" => 337,
            "image_id" => "sc6wcv",
            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc6wcv.jpg",
            "width" => 600,
            "checksum" => "7cd00600-8d97-9c7e-8079-84bad777e4bd",
          ],
        ],
        "similar_games" => [
                0 =>  [
                "id" => 18225,
            "cover" =>  [
                "id" => 74152,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1l7s.jpg",
            ],
            "name" => "The Sinking City",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              1 =>  [
                "id" => 48,
                "abbreviation" => "PS4",
              ],
              2 =>  [
                "id" => 49,
                "abbreviation" => "XONE",
              ],
              3 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ],
              4 =>  [
                "id" => 167,
                "abbreviation" => "PS5",
              ],
            ],
            "rating" => 76.800833111094,
            "slug" => "the-sinking-city",
          ],
          1 =>  [
                "id" => 20342,
            "cover" =>  [
                "id" => 92176,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1z4g.jpg",
            ],
            "name" => "Toby: The Secret Mine",
            "platforms" =>  [
                0 =>  [
                "id" => 3,
                "abbreviation" => "Linux",
              ],
              1 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              2 =>  [
                "id" => 14,
                "abbreviation" => "Mac",
              ],
              3 =>  [
                "id" => 34,
                "abbreviation" => "Android",
              ],
              4 =>  [
                "id" => 39,
                "abbreviation" => "iOS",
              ],
              5 =>  [
                "id" => 41,
                "abbreviation" => "WiiU",
              ],
              6 =>  [
                "id" => 48,
                "abbreviation" => "PS4",
              ],
              7 =>  [
                "id" => 49,
                "abbreviation" => "XONE",
              ],
              8 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ]
            ],
            "rating" => 70.0,
            "slug" => "toby-the-secret-mine",
          ],
          2 =>  [
                "id" => 25646,
            "cover" =>  [
                "id" => 82168,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1reg.jpg",
            ],
            "name" => "Don't Knock Twice",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              1 =>  [
                "id" => 48,
                "abbreviation" => "PS4",
              ],
              2 =>  [
                "id" => 49,
                "abbreviation" => "XONE",
              ],
              3 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ],
            ],
            "rating" => 69.795194242952,
            "slug" => "dont-knock-twice",
          ],
          3 =>  [
                "id" => 27266,
            "cover" =>  [
                "id" => 82227,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rg3.jpg",
            ],
            "name" => "House of Caravan",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ]
            ],
            "rating" => 50.0,
            "slug" => "house-of-caravan"
          ],
          4 =>  [
                "id" => 27725,
            "cover" =>  [
                "id" => 82224,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rg0.jpg",
            ],
            "name" => "The Room: Old Sins",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              1 =>  [
                "id" => 34,
                "abbreviation" => "Android",
              ],
              2 =>  [
                "id" => 39,
                "abbreviation" => "iOS",
              ],
            ],
            "rating" => 81.240585754329,
            "slug" => "the-room-old-sins",
          ],
          5 =>  [
                "id" => 28070,
            "cover" =>  [
                "id" => 81870,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1r66.jpg",
            ],
            "name" => "Planet Alpha",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              1 =>  [
                "id" => 48,
                "abbreviation" => "PS4",
              ],
              2 =>  [
                "id" => 49,
                "abbreviation" => "XONE",
              ],
              3 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ],
            ],
            "rating" => 69.387757619355,
            "slug" => "planet-alpha",
          ],
          6 =>  [
                "id" => 55190,
            "cover" =>  [
                "id" => 114450,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2gb6.jpg",
            ],
            "name" => "Pikuniku",
            "platforms" =>  [
                0 =>  [
                "id" => 3,
                "abbreviation" => "Linux",
              ],
              1 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              2 =>  [
                "id" => 14,
                "abbreviation" => "Mac",
              ],
              3 =>  [
                "id" => 49,
                "abbreviation" => "XONE",
              ],
              4 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ],
            ],
            "rating" => 67.838076286927,
            "slug" => "pikuniku",
          ],
          7 =>  [
                "id" => 56033,
            "cover" =>  [
                "id" => 82165,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1red.jpg",
            ],
            "name" => "Dream Alone",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              1 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ],
            ],
            "rating" => 82.0,
            "slug" => "dream-alone",
          ],
          8 =>  [
                "id" => 107614,
            "cover" =>  [
                "id" => 81932,
              "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1r7w.jpg",
            ],
            "name" => "Hello Neighbor: Hide and Seek",
            "platforms" =>  [
                0 =>  [
                "id" => 6,
                "abbreviation" => "PC",
              ],
              1 =>  [
                "id" => 39,
                "abbreviation" => "iOS",
              ],
              2 =>  [
                "id" => 48,
                "abbreviation" => "PS4",
              ],
              3 =>  [
                "id" => 49,
                "abbreviation" => "XONE",
              ],
              4 =>  [
                "id" => 130,
                "abbreviation" => "Switch",
              ],
              5 =>  [
                "id" => 203,
            ],
            ],
            "slug" => "hello-neighbor-hide-and-seek",
          ],
        ],
        "slug" => "fake-little-nightmares-ii",
        "summary" => "
          Little Nightmares II is a suspense-adventure game in which you play as Mono, a young boy trapped in a world that has been distorted by the humming transmission of a distant tower. With Six, the girl in a yellow raincoat, as his guide, Mono sets out to discover the dark secrets of The Signal Tower and save Six from her terrible fate; but their journey will not be straightforward as Mono and Six will face a gallery of new threats from the terrible residents of this world. \n
           \n
          Will you dare to face this collection of new, little nightmares?
          ",
        "total_rating_count" => 40,
        "videos" =>  [
                0 =>  [
                "id" => 29473,
            "game" => 121760,
            "name" => "Trailer",
            "video_id" => "OaTz44jLYd4",
            "checksum" => "6ed99b3f-5f68-6b90-b0f9-c76d00654ad8",
          ],
        ],
        "websites" =>  [
                0 =>  [
                "id" => 113583,
            "category" => 5,
            "game" => 121760,
            "trusted" => true,
            "url" => "https://twitter.com/LittleNights",
            "checksum" => "4c009ecc-0ded-83f5-d2d3-54713c04e750",
          ],
          1 =>  [
                "id" => 151527,
            "category" => 1,
            "game" => 121760,
            "trusted" => false,
            "url" => "https://en.bandainamcoent.eu/little-nightmares/little-nightmares-ii",
            "checksum" => "4536208a-90ea-53aa-9594-4af901af6650",
          ],
          2 =>  [
                "id" => 151570,
            "category" => 3,
            "game" => 121760,
            "trusted" => true,
            "url" => "https://en.wikipedia.org/wiki/Little_Nightmares_2",
            "checksum" => "8bf30a57-80eb-accb-e908-42afe5433314",
          ],
          3 =>  [
                "id" => 160370,
            "category" => 13,
            "game" => 121760,
            "trusted" => true,
            "url" => "https://store.steampowered.com/app/860510",
            "checksum" => "e27cfdec-b5c1-d115-f5c4-0495c4b80c25",
          ]
        ]
      ]
        ]);
    }

}
