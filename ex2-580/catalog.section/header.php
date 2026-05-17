<?
				if (!$APPLICATION->GetProperty("first_news")) {
				?>
					<div id="filial-special" class="information-block">
						<div class="top"></div>
						<div class="information-block-inner">
							<h3><?= GetMessage('REVIEWS') ?></h3>
							<div class="special-product">
								<div class="special-product-title">
									<?=$APPLICATION->ShowProperty("first_news")?>
								</div>
							</div>
						</div>
						<div class="bottom"></div>
					</div>
				<?}?>