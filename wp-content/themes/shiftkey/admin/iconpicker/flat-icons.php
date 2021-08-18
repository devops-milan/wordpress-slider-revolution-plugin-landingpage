<?php
add_filter( 'vc_iconpicker-type-flaticon', 'shiftkey_vc_iconpicker_flaticon_type' );
function shiftkey_vc_iconpicker_flaticon_type( $icons ) {  
	$flat_icons = shiftkey_flaticon_css(); 
    return array_merge( $icons, $flat_icons );
}

function shiftkey_flaticon_css(){
	$css = <<<CSS
.flaticon-001-zoom-out:before { content: "\f100"; }
.flaticon-002-zoom-in:before { content: "\f101"; }
.flaticon-003-close:before { content: "\f102"; }
.flaticon-004-wrench:before { content: "\f103"; }
.flaticon-005-wine:before { content: "\f104"; }
.flaticon-006-windows:before { content: "\f105"; }
.flaticon-007-wifi:before { content: "\f106"; }
.flaticon-008-router:before { content: "\f107"; }
.flaticon-009-wind:before { content: "\f108"; }
.flaticon-010-cloudy-2:before { content: "\f109"; }
.flaticon-011-storm-1:before { content: "\f10a"; }
.flaticon-012-snowing:before { content: "\f10b"; }
.flaticon-013-rain-2:before { content: "\f10c"; }
.flaticon-014-rain-1:before { content: "\f10d"; }
.flaticon-015-rain:before { content: "\f10e"; }
.flaticon-016-storm:before { content: "\f10f"; }
.flaticon-017-cloudy-1:before { content: "\f110"; }
.flaticon-018-cloudy:before { content: "\f111"; }
.flaticon-019-warning-1:before { content: "\f112"; }
.flaticon-020-warning:before { content: "\f113"; }
.flaticon-021-wallet-2:before { content: "\f114"; }
.flaticon-022-wallet-1:before { content: "\f115"; }
.flaticon-023-wallet:before { content: "\f116"; }
.flaticon-024-film-1:before { content: "\f117"; }
.flaticon-025-film:before { content: "\f118"; }
.flaticon-026-video-player:before { content: "\f119"; }
.flaticon-027-video-camera-3:before { content: "\f11a"; }
.flaticon-028-video-camera-2:before { content: "\f11b"; }
.flaticon-029-video-camera-1:before { content: "\f11c"; }
.flaticon-030-video-camera:before { content: "\f11d"; }
.flaticon-031-safebox:before { content: "\f11e"; }
.flaticon-032-user-3:before { content: "\f11f"; }
.flaticon-033-user-2:before { content: "\f120"; }
.flaticon-034-user-1:before { content: "\f121"; }
.flaticon-035-user:before { content: "\f122"; }
.flaticon-036-padlock-1:before { content: "\f123"; }
.flaticon-037-umbrella:before { content: "\f124"; }
.flaticon-038-television-2:before { content: "\f125"; }
.flaticon-039-television-1:before { content: "\f126"; }
.flaticon-040-television:before { content: "\f127"; }
.flaticon-041-turn-right-1:before { content: "\f128"; }
.flaticon-042-turn-right:before { content: "\f129"; }
.flaticon-043-tree:before { content: "\f12a"; }
.flaticon-044-trash-1:before { content: "\f12b"; }
.flaticon-045-trash:before { content: "\f12c"; }
.flaticon-046-list-2:before { content: "\f12d"; }
.flaticon-047-top-hat:before { content: "\f12e"; }
.flaticon-048-settings-1:before { content: "\f12f"; }
.flaticon-049-switches:before { content: "\f130"; }
.flaticon-050-settings:before { content: "\f131"; }
.flaticon-051-thermometer:before { content: "\f132"; }
.flaticon-052-right-align:before { content: "\f133"; }
.flaticon-053-align-left:before { content: "\f134"; }
.flaticon-054-justify:before { content: "\f135"; }
.flaticon-055-align-center:before { content: "\f136"; }
.flaticon-056-test-tube:before { content: "\f137"; }
.flaticon-057-terminal:before { content: "\f138"; }
.flaticon-058-target-1:before { content: "\f139"; }
.flaticon-059-target:before { content: "\f13a"; }
.flaticon-060-tag-1:before { content: "\f13b"; }
.flaticon-061-tag:before { content: "\f13c"; }
.flaticon-062-tablet:before { content: "\f13d"; }
.flaticon-063-sync:before { content: "\f13e"; }
.flaticon-064-sun:before { content: "\f13f"; }
.flaticon-065-sunset:before { content: "\f140"; }
.flaticon-066-sunrise:before { content: "\f141"; }
.flaticon-067-suitcase-1:before { content: "\f142"; }
.flaticon-068-suitcase:before { content: "\f143"; }
.flaticon-069-note:before { content: "\f144"; }
.flaticon-070-star-2:before { content: "\f145"; }
.flaticon-071-star-1:before { content: "\f146"; }
.flaticon-072-star:before { content: "\f147"; }
.flaticon-073-layer-1:before { content: "\f148"; }
.flaticon-074-layer:before { content: "\f149"; }
.flaticon-075-youtube-1:before { content: "\f14a"; }
.flaticon-076-yahoo-1:before { content: "\f14b"; }
.flaticon-077-wordpress-1:before { content: "\f14c"; }
.flaticon-078-vimeo-1:before { content: "\f14d"; }
.flaticon-079-twitter-1:before { content: "\f14e"; }
.flaticon-080-tumblr-1:before { content: "\f14f"; }
.flaticon-081-youtube:before { content: "\f150"; }
.flaticon-082-yahoo:before { content: "\f151"; }
.flaticon-083-wordpress:before { content: "\f152"; }
.flaticon-084-vimeo:before { content: "\f153"; }
.flaticon-085-twitter:before { content: "\f154"; }
.flaticon-086-tumblr:before { content: "\f155"; }
.flaticon-087-pinterest-1:before { content: "\f156"; }
.flaticon-088-linkedin-1:before { content: "\f157"; }
.flaticon-089-instagram-1:before { content: "\f158"; }
.flaticon-090-google-plus-1:before { content: "\f159"; }
.flaticon-091-facebook-1:before { content: "\f15a"; }
.flaticon-092-dropbox-1:before { content: "\f15b"; }
.flaticon-093-dribbble-1:before { content: "\f15c"; }
.flaticon-094-pinterest:before { content: "\f15d"; }
.flaticon-095-linkedin:before { content: "\f15e"; }
.flaticon-096-instagram:before { content: "\f15f"; }
.flaticon-097-google-plus:before { content: "\f160"; }
.flaticon-098-facebook:before { content: "\f161"; }
.flaticon-099-dropbox:before { content: "\f162"; }
.flaticon-100-dribbble:before { content: "\f163"; }
.flaticon-101-signal:before { content: "\f164"; }
.flaticon-102-sign:before { content: "\f165"; }
.flaticon-103-shuffle:before { content: "\f166"; }
.flaticon-104-shopping-cart-6:before { content: "\f167"; }
.flaticon-105-shopping-cart-5:before { content: "\f168"; }
.flaticon-106-shopping-cart-4:before { content: "\f169"; }
.flaticon-107-shopping-cart-3:before { content: "\f16a"; }
.flaticon-108-shopping-cart-2:before { content: "\f16b"; }
.flaticon-109-shopping-cart-1:before { content: "\f16c"; }
.flaticon-110-shopping-cart:before { content: "\f16d"; }
.flaticon-111-shopping-basket-6:before { content: "\f16e"; }
.flaticon-112-shopping-basket-5:before { content: "\f16f"; }
.flaticon-113-shopping-basket-4:before { content: "\f170"; }
.flaticon-114-shopping-basket-3:before { content: "\f171"; }
.flaticon-115-shopping-basket-2:before { content: "\f172"; }
.flaticon-116-shopping-basket-1:before { content: "\f173"; }
.flaticon-117-shopping-basket:before { content: "\f174"; }
.flaticon-118-shopping-bag-1:before { content: "\f175"; }
.flaticon-119-shopping-bag:before { content: "\f176"; }
.flaticon-120-shop:before { content: "\f177"; }
.flaticon-121-shield:before { content: "\f178"; }
.flaticon-122-share:before { content: "\f179"; }
.flaticon-123-upload:before { content: "\f17a"; }
.flaticon-124-hierarchical-structure:before { content: "\f17b"; }
.flaticon-125-up-arrow-8:before { content: "\f17c"; }
.flaticon-126-send-1:before { content: "\f17d"; }
.flaticon-127-back:before { content: "\f17e"; }
.flaticon-128-down-arrow-7:before { content: "\f17f"; }
.flaticon-129-search:before { content: "\f180"; }
.flaticon-130-scissors:before { content: "\f181"; }
.flaticon-131-rss-1:before { content: "\f182"; }
.flaticon-132-rss:before { content: "\f183"; }
.flaticon-133-rocket:before { content: "\f184"; }
.flaticon-134-curve:before { content: "\f185"; }
.flaticon-135-repeat:before { content: "\f186"; }
.flaticon-136-reload-2:before { content: "\f187"; }
.flaticon-137-reload-1:before { content: "\f188"; }
.flaticon-138-reload:before { content: "\f189"; }
.flaticon-139-turntable:before { content: "\f18a"; }
.flaticon-140-invoice-1:before { content: "\f18b"; }
.flaticon-141-invoice:before { content: "\f18c"; }
.flaticon-142-rainbow:before { content: "\f18d"; }
.flaticon-143-radio-1:before { content: "\f18e"; }
.flaticon-144-radio:before { content: "\f18f"; }
.flaticon-145-radar:before { content: "\f190"; }
.flaticon-146-printer:before { content: "\f191"; }
.flaticon-147-presentation-4:before { content: "\f192"; }
.flaticon-148-presentation-3:before { content: "\f193"; }
.flaticon-149-presentation-2:before { content: "\f194"; }
.flaticon-150-presentation-1:before { content: "\f195"; }
.flaticon-151-presentation:before { content: "\f196"; }
.flaticon-152-power:before { content: "\f197"; }
.flaticon-153-popsicle:before { content: "\f198"; }
.flaticon-154-podcast-1:before { content: "\f199"; }
.flaticon-155-podcast:before { content: "\f19a"; }
.flaticon-156-add:before { content: "\f19b"; }
.flaticon-157-stop:before { content: "\f19c"; }
.flaticon-158-rec-1:before { content: "\f19d"; }
.flaticon-159-play-button:before { content: "\f19e"; }
.flaticon-160-pause:before { content: "\f19f"; }
.flaticon-161-next:before { content: "\f1a0"; }
.flaticon-162-fast-forward:before { content: "\f1a1"; }
.flaticon-163-eject:before { content: "\f1a2"; }
.flaticon-164-planet:before { content: "\f1a3"; }
.flaticon-165-pill:before { content: "\f1a4"; }
.flaticon-166-pie-chart:before { content: "\f1a5"; }
.flaticon-167-picture-1:before { content: "\f1a6"; }
.flaticon-168-gallery:before { content: "\f1a7"; }
.flaticon-169-copy-1:before { content: "\f1a8"; }
.flaticon-170-copy:before { content: "\f1a9"; }
.flaticon-171-picture:before { content: "\f1aa"; }
.flaticon-172-telephone-1:before { content: "\f1ab"; }
.flaticon-173-telephone:before { content: "\f1ac"; }
.flaticon-174-pencil:before { content: "\f1ad"; }
.flaticon-175-paperclip:before { content: "\f1ae"; }
.flaticon-176-shredder:before { content: "\f1af"; }
.flaticon-177-euro-4:before { content: "\f1b0"; }
.flaticon-178-euro-3:before { content: "\f1b1"; }
.flaticon-179-euro-2:before { content: "\f1b2"; }
.flaticon-180-dollar-4:before { content: "\f1b3"; }
.flaticon-181-dollar-3:before { content: "\f1b4"; }
.flaticon-182-dollar-2:before { content: "\f1b5"; }
.flaticon-183-bitcoin-4:before { content: "\f1b6"; }
.flaticon-184-bitcoin-3:before { content: "\f1b7"; }
.flaticon-185-bitcoin-2:before { content: "\f1b8"; }
.flaticon-186-send:before { content: "\f1b9"; }
.flaticon-187-square-2:before { content: "\f1ba"; }
.flaticon-188-up-arrow-7:before { content: "\f1bb"; }
.flaticon-189-square-1:before { content: "\f1bc"; }
.flaticon-190-down-arrow-6:before { content: "\f1bd"; }
.flaticon-191-circle:before { content: "\f1be"; }
.flaticon-192-up-arrow-6:before { content: "\f1bf"; }
.flaticon-193-down-arrow-5:before { content: "\f1c0"; }
.flaticon-194-rec:before { content: "\f1c1"; }
.flaticon-195-notepad:before { content: "\f1c2"; }
.flaticon-196-access-denied:before { content: "\f1c3"; }
.flaticon-197-newspaper-1:before { content: "\f1c4"; }
.flaticon-198-newspaper:before { content: "\f1c5"; }
.flaticon-199-tie:before { content: "\f1c6"; }
.flaticon-200-music-4:before { content: "\f1c7"; }
.flaticon-201-playlist:before { content: "\f1c8"; }
.flaticon-202-music-3:before { content: "\f1c9"; }
.flaticon-203-music-2:before { content: "\f1ca"; }
.flaticon-204-music-1:before { content: "\f1cb"; }
.flaticon-205-music:before { content: "\f1cc"; }
.flaticon-206-move:before { content: "\f1cd"; }
.flaticon-207-mouse:before { content: "\f1ce"; }
.flaticon-208-more-1:before { content: "\f1cf"; }
.flaticon-209-more:before { content: "\f1d0"; }
.flaticon-210-moon-9:before { content: "\f1d1"; }
.flaticon-211-moon-8:before { content: "\f1d2"; }
.flaticon-212-moon-7:before { content: "\f1d3"; }
.flaticon-213-moon-6:before { content: "\f1d4"; }
.flaticon-214-moon-5:before { content: "\f1d5"; }
.flaticon-215-moon-4:before { content: "\f1d6"; }
.flaticon-216-moon-3:before { content: "\f1d7"; }
.flaticon-217-moon-2:before { content: "\f1d8"; }
.flaticon-218-moon-1:before { content: "\f1d9"; }
.flaticon-219-moon:before { content: "\f1da"; }
.flaticon-220-smartphone:before { content: "\f1db"; }
.flaticon-221-minus:before { content: "\f1dc"; }
.flaticon-222-minimize:before { content: "\f1dd"; }
.flaticon-223-microphone-1:before { content: "\f1de"; }
.flaticon-224-microphone:before { content: "\f1df"; }
.flaticon-225-megaphone-2:before { content: "\f1e0"; }
.flaticon-226-megaphone-1:before { content: "\f1e1"; }
.flaticon-227-megaphone:before { content: "\f1e2"; }
.flaticon-228-medicine:before { content: "\f1e3"; }
.flaticon-229-hospital-1:before { content: "\f1e4"; }
.flaticon-230-hospital:before { content: "\f1e5"; }
.flaticon-231-maximize:before { content: "\f1e6"; }
.flaticon-232-map-1:before { content: "\f1e7"; }
.flaticon-233-map:before { content: "\f1e8"; }
.flaticon-234-mail-1:before { content: "\f1e9"; }
.flaticon-235-mail:before { content: "\f1ea"; }
.flaticon-236-cancel:before { content: "\f1eb"; }
.flaticon-237-padlock:before { content: "\f1ec"; }
.flaticon-238-pin:before { content: "\f1ed"; }
.flaticon-239-placeholder-1:before { content: "\f1ee"; }
.flaticon-240-placeholder:before { content: "\f1ef"; }
.flaticon-241-list-1:before { content: "\f1f0"; }
.flaticon-242-list:before { content: "\f1f1"; }
.flaticon-243-menu:before { content: "\f1f2"; }
.flaticon-244-lightning:before { content: "\f1f3"; }
.flaticon-245-layout-2:before { content: "\f1f4"; }
.flaticon-246-layout-1:before { content: "\f1f5"; }
.flaticon-247-layout:before { content: "\f1f6"; }
.flaticon-248-up-arrow-5:before { content: "\f1f7"; }
.flaticon-249-right-arrow-5:before { content: "\f1f8"; }
.flaticon-250-left-arrow-5:before { content: "\f1f9"; }
.flaticon-251-down-arrow-4:before { content: "\f1fa"; }
.flaticon-252-laptop:before { content: "\f1fb"; }
.flaticon-253-keyboard-2:before { content: "\f1fc"; }
.flaticon-254-keyboard-1:before { content: "\f1fd"; }
.flaticon-255-keyboard:before { content: "\f1fe"; }
.flaticon-256-key-1:before { content: "\f1ff"; }
.flaticon-257-key:before { content: "\f200"; }
.flaticon-258-info:before { content: "\f201"; }
.flaticon-259-inbox-3:before { content: "\f202"; }
.flaticon-260-outbox:before { content: "\f203"; }
.flaticon-261-inbox-2:before { content: "\f204"; }
.flaticon-262-inbox-1:before { content: "\f205"; }
.flaticon-263-inbox:before { content: "\f206"; }
.flaticon-264-house:before { content: "\f207"; }
.flaticon-265-question:before { content: "\f208"; }
.flaticon-266-help:before { content: "\f209"; }
.flaticon-267-broken-heart-1:before { content: "\f20a"; }
.flaticon-268-broken-heart:before { content: "\f20b"; }
.flaticon-269-heart:before { content: "\f20c"; }
.flaticon-270-headphones-2:before { content: "\f20d"; }
.flaticon-271-headphones-1:before { content: "\f20e"; }
.flaticon-272-headphones:before { content: "\f20f"; }
.flaticon-273-hard-drive:before { content: "\f210"; }
.flaticon-274-handbag:before { content: "\f211"; }
.flaticon-275-grid-7:before { content: "\f212"; }
.flaticon-276-grid-6:before { content: "\f213"; }
.flaticon-277-grid-5:before { content: "\f214"; }
.flaticon-278-grid-4:before { content: "\f215"; }
.flaticon-279-grid-3:before { content: "\f216"; }
.flaticon-280-grid-2:before { content: "\f217"; }
.flaticon-281-grid-1:before { content: "\f218"; }
.flaticon-282-grid:before { content: "\f219"; }
.flaticon-283-square:before { content: "\f21a"; }
.flaticon-284-internet-3:before { content: "\f21b"; }
.flaticon-285-internet-2:before { content: "\f21c"; }
.flaticon-286-earth-globe:before { content: "\f21d"; }
.flaticon-287-internet-1:before { content: "\f21e"; }
.flaticon-288-internet:before { content: "\f21f"; }
.flaticon-289-gift:before { content: "\f220"; }
.flaticon-290-gear-2:before { content: "\f221"; }
.flaticon-291-gear-1:before { content: "\f222"; }
.flaticon-292-gear:before { content: "\f223"; }
.flaticon-293-gamepad:before { content: "\f224"; }
.flaticon-294-arrows:before { content: "\f225"; }
.flaticon-295-folder-3:before { content: "\f226"; }
.flaticon-296-folder-2:before { content: "\f227"; }
.flaticon-297-folder-1:before { content: "\f228"; }
.flaticon-298-folder:before { content: "\f229"; }
.flaticon-299-diskette-1:before { content: "\f22a"; }
.flaticon-300-diskette:before { content: "\f22b"; }
.flaticon-301-flag-1:before { content: "\f22c"; }
.flaticon-302-flag:before { content: "\f22d"; }
.flaticon-303-finder:before { content: "\f22e"; }
.flaticon-304-funnel-2:before { content: "\f22f"; }
.flaticon-305-funnel-1:before { content: "\f230"; }
.flaticon-306-funnel:before { content: "\f231"; }
.flaticon-307-fahrenheit:before { content: "\f232"; }
.flaticon-308-view:before { content: "\f233"; }
.flaticon-309-expand:before { content: "\f234"; }
.flaticon-310-euro-1:before { content: "\f235"; }
.flaticon-311-euro:before { content: "\f236"; }
.flaticon-312-envelope-1:before { content: "\f237"; }
.flaticon-313-envelope:before { content: "\f238"; }
.flaticon-314-login-1:before { content: "\f239"; }
.flaticon-315-login:before { content: "\f23a"; }
.flaticon-316-mortarboard:before { content: "\f23b"; }
.flaticon-317-edit:before { content: "\f23c"; }
.flaticon-318-planet-earth:before { content: "\f23d"; }
.flaticon-319-droplet:before { content: "\f23e"; }
.flaticon-320-drawer-2:before { content: "\f23f"; }
.flaticon-321-drawer-1:before { content: "\f240"; }
.flaticon-322-drawer:before { content: "\f241"; }
.flaticon-323-download-2:before { content: "\f242"; }
.flaticon-324-dollar-1:before { content: "\f243"; }
.flaticon-325-dollar:before { content: "\f244"; }
.flaticon-326-file-3:before { content: "\f245"; }
.flaticon-327-file-2:before { content: "\f246"; }
.flaticon-328-psd:before { content: "\f247"; }
.flaticon-329-png:before { content: "\f248"; }
.flaticon-330-pdf:before { content: "\f249"; }
.flaticon-331-jpg:before { content: "\f24a"; }
.flaticon-332-gif:before { content: "\f24b"; }
.flaticon-333-ai:before { content: "\f24c"; }
.flaticon-334-file-1:before { content: "\f24d"; }
.flaticon-335-file:before { content: "\f24e"; }
.flaticon-336-dna:before { content: "\f24f"; }
.flaticon-337-diamond:before { content: "\f250"; }
.flaticon-338-monitor:before { content: "\f251"; }
.flaticon-339-desk:before { content: "\f252"; }
.flaticon-340-database:before { content: "\f253"; }
.flaticon-341-credit-card-1:before { content: "\f254"; }
.flaticon-342-credit-card:before { content: "\f255"; }
.flaticon-343-business-card-3:before { content: "\f256"; }
.flaticon-344-business-card-2:before { content: "\f257"; }
.flaticon-345-business-card-1:before { content: "\f258"; }
.flaticon-346-business-card:before { content: "\f259"; }
.flaticon-347-connections:before { content: "\f25a"; }
.flaticon-348-computer-4:before { content: "\f25b"; }
.flaticon-349-computer-3:before { content: "\f25c"; }
.flaticon-350-computer-2:before { content: "\f25d"; }
.flaticon-351-computer-1:before { content: "\f25e"; }
.flaticon-352-computer:before { content: "\f25f"; }
.flaticon-353-compass:before { content: "\f260"; }
.flaticon-354-coffee-cup:before { content: "\f261"; }
.flaticon-355-cloud-computing-2:before { content: "\f262"; }
.flaticon-356-cloud-computing-1:before { content: "\f263"; }
.flaticon-357-cloud-computing:before { content: "\f264"; }
.flaticon-358-wall-clock-1:before { content: "\f265"; }
.flaticon-359-wall-clock:before { content: "\f266"; }
.flaticon-360-clipboard:before { content: "\f267"; }
.flaticon-361-chrome:before { content: "\f268"; }
.flaticon-362-up-arrow-4:before { content: "\f269"; }
.flaticon-363-up-arrow-3:before { content: "\f26a"; }
.flaticon-364-right-arrow-4:before { content: "\f26b"; }
.flaticon-365-left-arrow-4:before { content: "\f26c"; }
.flaticon-366-down-arrow-3:before { content: "\f26d"; }
.flaticon-367-right-arrow-3:before { content: "\f26e"; }
.flaticon-368-left-arrow-3:before { content: "\f26f"; }
.flaticon-369-down-arrow-2:before { content: "\f270"; }
.flaticon-370-up-arrow-2:before { content: "\f271"; }
.flaticon-371-right-arrow-2:before { content: "\f272"; }
.flaticon-372-left-arrow-2:before { content: "\f273"; }
.flaticon-373-down-arrow-1:before { content: "\f274"; }
.flaticon-374-checked-1:before { content: "\f275"; }
.flaticon-375-checked:before { content: "\f276"; }
.flaticon-376-chat-2:before { content: "\f277"; }
.flaticon-377-chat-1:before { content: "\f278"; }
.flaticon-378-chat:before { content: "\f279"; }
.flaticon-379-celsius:before { content: "\f27a"; }
.flaticon-380-cash-register:before { content: "\f27b"; }
.flaticon-381-up-arrow-1:before { content: "\f27c"; }
.flaticon-382-right-arrow-1:before { content: "\f27d"; }
.flaticon-383-left-arrow-1:before { content: "\f27e"; }
.flaticon-384-down-arrow:before { content: "\f27f"; }
.flaticon-385-photo-camera-4:before { content: "\f280"; }
.flaticon-386-photo-camera-3:before { content: "\f281"; }
.flaticon-387-photo-camera-2:before { content: "\f282"; }
.flaticon-388-photo-camera-1:before { content: "\f283"; }
.flaticon-389-photo-camera:before { content: "\f284"; }
.flaticon-390-calendar-1:before { content: "\f285"; }
.flaticon-391-calendar:before { content: "\f286"; }
.flaticon-392-calculator:before { content: "\f287"; }
.flaticon-393-building:before { content: "\f288"; }
.flaticon-394-browser-2:before { content: "\f289"; }
.flaticon-395-browser-1:before { content: "\f28a"; }
.flaticon-396-browser:before { content: "\f28b"; }
.flaticon-397-briefcase:before { content: "\f28c"; }
.flaticon-398-box-5:before { content: "\f28d"; }
.flaticon-399-box-4:before { content: "\f28e"; }
.flaticon-400-box-3:before { content: "\f28f"; }
.flaticon-401-box-2:before { content: "\f290"; }
.flaticon-402-bow-tie:before { content: "\f291"; }
.flaticon-403-bottle:before { content: "\f292"; }
.flaticon-404-bookshelf:before { content: "\f293"; }
.flaticon-405-notebook-1:before { content: "\f294"; }
.flaticon-406-bookmark-1:before { content: "\f295"; }
.flaticon-407-bookmark:before { content: "\f296"; }
.flaticon-408-notebook:before { content: "\f297"; }
.flaticon-409-bone-1:before { content: "\f298"; }
.flaticon-410-bone:before { content: "\f299"; }
.flaticon-411-bluetooth:before { content: "\f29a"; }
.flaticon-412-bitcoin-1:before { content: "\f29b"; }
.flaticon-413-bitcoin:before { content: "\f29c"; }
.flaticon-414-binoculars:before { content: "\f29d"; }
.flaticon-415-billboard-1:before { content: "\f29e"; }
.flaticon-416-billboard:before { content: "\f29f"; }
.flaticon-417-bell:before { content: "\f2a0"; }
.flaticon-418-flask-2:before { content: "\f2a1"; }
.flaticon-419-flask-1:before { content: "\f2a2"; }
.flaticon-420-flask:before { content: "\f2a3"; }
.flaticon-421-full-battery:before { content: "\f2a4"; }
.flaticon-422-empty-battery:before { content: "\f2a5"; }
.flaticon-423-battery-1:before { content: "\f2a6"; }
.flaticon-424-battery:before { content: "\f2a7"; }
.flaticon-425-half-battery:before { content: "\f2a8"; }
.flaticon-426-low-battery:before { content: "\f2a9"; }
.flaticon-427-barcode-2:before { content: "\f2aa"; }
.flaticon-428-barcode-1:before { content: "\f2ab"; }
.flaticon-429-barcode:before { content: "\f2ac"; }
.flaticon-430-bar-chart:before { content: "\f2ad"; }
.flaticon-431-bank:before { content: "\f2ae"; }
.flaticon-432-band-aid:before { content: "\f2af"; }
.flaticon-433-mute-1:before { content: "\f2b0"; }
.flaticon-434-mute:before { content: "\f2b1"; }
.flaticon-435-audio-2:before { content: "\f2b2"; }
.flaticon-436-audio-1:before { content: "\f2b3"; }
.flaticon-437-audio:before { content: "\f2b4"; }
.flaticon-438-physics:before { content: "\f2b5"; }
.flaticon-439-at:before { content: "\f2b6"; }
.flaticon-440-up-arrow:before { content: "\f2b7"; }
.flaticon-441-right-arrow:before { content: "\f2b8"; }
.flaticon-442-left-arrow:before { content: "\f2b9"; }
.flaticon-443-download-1:before { content: "\f2ba"; }
.flaticon-444-download:before { content: "\f2bb"; }
.flaticon-445-box-1:before { content: "\f2bc"; }
.flaticon-446-box:before { content: "\f2bd"; }
.flaticon-447-android:before { content: "\f2be"; }
.flaticon-448-airplay:before { content: "\f2bf"; }
.flaticon-449-ticket-1:before { content: "\f2c0"; }
.flaticon-450-ticket:before { content: "\f2c1"; }
CSS;

	return shiftkey_breakCSS_iconArr($css);
}

