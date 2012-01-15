<?php
	/**
	 * The abstract QSortableGen class defined here is
	 * code-generated and contains options, events and methods scraped from the
	 * JQuery UI documentation Web site. It is not generated by the typical
	 * codegen process, but rather is generated periodically by the core QCubed
	 * team and checked in. However, the code to generate this file is
	 * in the assets/_core/php/_devetools/jquery_ui_gen/jq_control_gen.php file
	 * and you can regenerate the files if you need to.
	 *
	 * The comments in this file are taken from the JQuery UI site, so they do
	 * not always make sense with regard to QCubed. They are simply provided
	 * as reference. Note that this is very low-level code, and does not always
	 * update QCubed state variables. See the QSortableBase 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QSortable class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
	/**
	 * This event is triggered when sortable is created.
	 */
	class QSortable_CreateEvent extends QJqUiEvent {
		const EventName = 'sortcreate';
	}
	/**
	 * This event is triggered when sorting starts.
	 */
	class QSortable_StartEvent extends QJqUiEvent {
		const EventName = 'sortstart';
	}
	/**
	 * This event is triggered during sorting.
	 */
	class QSortable_SortEvent extends QJqUiEvent {
		const EventName = 'sort';
	}
	/**
	 * This event is triggered during sorting, but only when the DOM position has
	 * 		changed.
	 */
	class QSortable_ChangeEvent extends QJqUiEvent {
		const EventName = 'sortchange';
	}
	/**
	 * This event is triggered when sorting stops, but when the placeholder/helper
	 * 		is still available.
	 */
	class QSortable_BeforeStopEvent extends QJqUiEvent {
		const EventName = 'sortbeforestop';
	}
	/**
	 * This event is triggered when sorting has stopped.
	 */
	class QSortable_StopEvent extends QJqUiEvent {
		const EventName = 'sortstop';
	}
	/**
	 * This event is triggered when the user stopped sorting and the DOM position
	 * 		has changed.
	 */
	class QSortable_UpdateEvent extends QJqUiEvent {
		const EventName = 'sortupdate';
	}
	/**
	 * This event is triggered when a connected sortable list has received an item
	 * 		from another list.
	 */
	class QSortable_ReceiveEvent extends QJqUiEvent {
		const EventName = 'sortreceive';
	}
	/**
	 * This event is triggered when a sortable item has been dragged out from the
	 * 		list and into another.
	 */
	class QSortable_RemoveEvent extends QJqUiEvent {
		const EventName = 'sortremove';
	}
	/**
	 * This event is triggered when a sortable item is moved into a connected
	 * 		list.
	 */
	class QSortable_OverEvent extends QJqUiEvent {
		const EventName = 'sortover';
	}
	/**
	 * This event is triggered when a sortable item is moved away from a connected
	 * 		list.
	 */
	class QSortable_OutEvent extends QJqUiEvent {
		const EventName = 'sortout';
	}
	/**
	 * This event is triggered when using connected lists, every connected list on
	 * 		drag start receives it.
	 */
	class QSortable_ActivateEvent extends QJqUiEvent {
		const EventName = 'sortactivate';
	}
	/**
	 * This event is triggered when sorting was stopped, is propagated to all
	 * 		possible connected lists.
	 */
	class QSortable_DeactivateEvent extends QJqUiEvent {
		const EventName = 'sortdeactivate';
	}

	/* Custom "property" event classes for this control */

	/**
	 * @property boolean $Disabled Disables (true) or enables (false) the sortable. Can be set when
	 * 		initialising (first creating) the sortable.
	 * @property string $AppendTo Defines where the helper that moves with the mouse is being appended to
	 * 		during the drag (for example, to resolve overlap/zIndex issues).
	 * @property string $Axis If defined, the items can be dragged only horizontally or vertically.
	 * 		Possible values:'x', 'y'.
	 * @property mixed $Cancel Prevents sorting if you start on elements matching the selector.
	 * @property mixed $ConnectWith Takes a jQuery selector with items that also have sortables applied. If
	 * 		used, the sortable is now connected to the other one-way, so you can drag
	 * 		from this sortable to the other.
	 * @property mixed $Containment Constrains dragging to within the bounds of the specified element - can be
	 * 		a DOM element, 'parent', 'document', 'window', or a jQuery selector.
	 * Note:
	 * 		the element specified for containment must have a calculated width and
	 * 		height (though it need not be explicit), so for example, if you have
	 * 		float:left sortable children and specify containment:'parent' be sure to
	 * 		have float:left on the sortable/parent container as well or it will have
	 * 		height: 0, causing undefined behavior.
	 * @property string $Cursor Defines the cursor that is being shown while sorting.
	 * @property mixed $CursorAt Moves the sorting element or helper so the cursor always appears to drag
	 * 		from the same position. Coordinates can be given as a hash using a
	 * 		combination of one or two keys: { top, left, right, bottom }.
	 * @property integer $Delay Time in milliseconds to define when the sorting should start. It helps
	 * 		preventing unwanted drags when clicking on an element.
	 * @property integer $Distance Tolerance, in pixels, for when sorting should start. If specified, sorting
	 * 		will not start until after mouse is dragged beyond distance. Can be used to
	 * 		allow for clicks on elements within a handle.
	 * @property boolean $DropOnEmpty If false items from this sortable can't be dropped to an empty linked
	 * 		sortable.
	 * @property boolean $ForceHelperSize If true, forces the helper to have a size.
	 * @property boolean $ForcePlaceholderSize If true, forces the placeholder to have a size.
	 * @property array $Grid Snaps the sorting element or helper to a grid, every x and y pixels. Array
	 * 		values: [x, y]
	 * @property mixed $Handle Restricts sort start click to the specified element.
	 * @property mixed $Helper Allows for a helper element to be used for dragging display. The supplied
	 * 		function receives the event and the element being sorted, and should return
	 * 		a DOMElement to be used as a custom proxy helper. Possible values:
	 * 		'original', 'clone'
	 * @property mixed $Items Specifies which items inside the element should be sortable.
	 * @property QJsClosure $Opacity Defines the opacity of the helper while sorting. From 0.01 to 1
	 * @property string $Placeholder Class that gets applied to the otherwise white space.
	 * @property QJsClosure $Revert If set to true, the item will be reverted to its new DOM position with a
	 * 		smooth animation. Optionally, it can also be set to a number that controls
	 * 		the duration of the animation in ms.
	 * @property boolean $Scroll If set to true, the page scrolls when coming to an edge.
	 * @property integer $ScrollSensitivity Defines how near the mouse must be to an edge to start scrolling.
	 * @property integer $ScrollSpeed The speed at which the window should scroll once the mouse pointer gets
	 * 		within the scrollSensitivity distance.
	 * @property string $Tolerance This is the way the reordering behaves during drag. Possible values:
	 * 		'intersect', 'pointer'. In some setups, 'pointer' is more
	 * 		natural.
	 * 
	 * 
	 * intersect: draggable overlaps the droppable at least
	 * 		50%
	 * pointer: mouse pointer overlaps the droppable
	 * @property integer $ZIndex Z-index for element/helper while being sorted.
	 */

	class QSortableGen extends QPanel	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var boolean */
		protected $blnDisabled = null;
		/** @var string */
		protected $strAppendTo = null;
		/** @var string */
		protected $strAxis = null;
		/** @var mixed */
		protected $mixCancel = null;
		/** @var mixed */
		protected $mixConnectWith = null;
		/** @var mixed */
		protected $mixContainment = null;
		/** @var string */
		protected $strCursor = null;
		/** @var mixed */
		protected $mixCursorAt = null;
		/** @var integer */
		protected $intDelay;
		/** @var integer */
		protected $intDistance = null;
		/** @var boolean */
		protected $blnDropOnEmpty = null;
		/** @var boolean */
		protected $blnForceHelperSize = null;
		/** @var boolean */
		protected $blnForcePlaceholderSize = null;
		/** @var array */
		protected $arrGrid = null;
		/** @var mixed */
		protected $mixHandle = null;
		/** @var mixed */
		protected $mixHelper = null;
		/** @var mixed */
		protected $mixItems = null;
		/** @var QJsClosure */
		protected $mixOpacity = null;
		/** @var string */
		protected $strPlaceholder = null;
		/** @var QJsClosure */
		protected $mixRevert = null;
		/** @var boolean */
		protected $blnScroll = null;
		/** @var integer */
		protected $intScrollSensitivity = null;
		/** @var integer */
		protected $intScrollSpeed = null;
		/** @var string */
		protected $strTolerance = null;
		/** @var integer */
		protected $intZIndex = null;
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('Disabled', 'disabled');
			$strJqOptions .= $this->makeJsProperty('AppendTo', 'appendTo');
			$strJqOptions .= $this->makeJsProperty('Axis', 'axis');
			$strJqOptions .= $this->makeJsProperty('Cancel', 'cancel');
			$strJqOptions .= $this->makeJsProperty('ConnectWith', 'connectWith');
			$strJqOptions .= $this->makeJsProperty('Containment', 'containment');
			$strJqOptions .= $this->makeJsProperty('Cursor', 'cursor');
			$strJqOptions .= $this->makeJsProperty('CursorAt', 'cursorAt');
			$strJqOptions .= $this->makeJsProperty('Delay', 'delay');
			$strJqOptions .= $this->makeJsProperty('Distance', 'distance');
			$strJqOptions .= $this->makeJsProperty('DropOnEmpty', 'dropOnEmpty');
			$strJqOptions .= $this->makeJsProperty('ForceHelperSize', 'forceHelperSize');
			$strJqOptions .= $this->makeJsProperty('ForcePlaceholderSize', 'forcePlaceholderSize');
			$strJqOptions .= $this->makeJsProperty('Grid', 'grid');
			$strJqOptions .= $this->makeJsProperty('Handle', 'handle');
			$strJqOptions .= $this->makeJsProperty('Helper', 'helper');
			$strJqOptions .= $this->makeJsProperty('Items', 'items');
			$strJqOptions .= $this->makeJsProperty('Opacity', 'opacity');
			$strJqOptions .= $this->makeJsProperty('Placeholder', 'placeholder');
			$strJqOptions .= $this->makeJsProperty('Revert', 'revert');
			$strJqOptions .= $this->makeJsProperty('Scroll', 'scroll');
			$strJqOptions .= $this->makeJsProperty('ScrollSensitivity', 'scrollSensitivity');
			$strJqOptions .= $this->makeJsProperty('ScrollSpeed', 'scrollSpeed');
			$strJqOptions .= $this->makeJsProperty('Tolerance', 'tolerance');
			$strJqOptions .= $this->makeJsProperty('ZIndex', 'zIndex');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqControlId() {
			return $this->ControlId;
		}

		public function getJqSetupFunction() {
			return 'sortable';
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").%s({%s})', $this->getJqControlId(), $this->getJqSetupFunction(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			return  $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
		}
		
		/**
		 * Call a JQuery UI Method on the object. Takes variable number of arguments.
		 * 
		 * @param string $strMethodName the method name to call
		 * @internal param $mixed [optional] $mixParam1
		 * @internal param $mixed [optional] $mixParam2
		 */
		protected function CallJqUiMethod($strMethodName /*, ... */) {
			$args = array();
			$args = func_get_args();

			$strArgs = JavaScriptHelper::toJsObject($args);
			$strJs = sprintf('jQuery("#%s").%s(%s)',
				$this->getJqControlId(),
				$this->getJqSetupFunction(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			QApplication::ExecuteJavaScript($strJs);
		}


		/**
		 * Remove the sortable functionality completely. This will return the element
		 * back to its pre-init state.
		 */
		public function Destroy() {
			$this->CallJqUiMethod("destroy");
		}
		/**
		 * Disable the sortable.
		 */
		public function Disable() {
			$this->CallJqUiMethod("disable");
		}
		/**
		 * Enable the sortable.
		 */
		public function Enable() {
			$this->CallJqUiMethod("enable");
		}
		/**
		 * Get or set any sortable option. If no value is specified, will act as a
		 * getter.
		 * @param $optionName
		 * @param $value
		 */
		public function Option($optionName, $value = null) {
			$this->CallJqUiMethod("option", $optionName, $value);
		}
		/**
		 * Set multiple sortable options at once by providing an options object.
		 * @param $options
		 */
		public function Option1($options) {
			$this->CallJqUiMethod("option", $options);
		}
		/**
		 * Serializes the sortable's item id's into a form/ajax submittable string.
		 * Calling this method produces a hash that can be appended to any url to
		 * easily submit a new item order back to the server.
		 * It works by default by looking at the id of each item in the format
		 * 'setname_number', and it spits out a hash like
		 * "setname[]=number&amp;setname[]=number".
		 * You can also give in a option hash as second argument to custom define how
		 * the function works. The possible options are: 'key' (replaces part1[] with
		 * whatever you want), 'attribute' (test another attribute than 'id') and
		 * 'expression' (use your own regexp).
		 * If serialize returns an empty string, make sure the id attributes include
		 * an underscore.  They must be in the form: "set_number" For example, a 3
		 * element list with id attributes foo_1, foo_5, foo_2 will serialize to
		 * foo[]=1&amp;foo[]=5&amp;foo[]=2. You can use an underscore, equal sign or
		 * hyphen to separate the set and number.  For example foo=1 or foo-1 or foo_1
		 * all serialize to foo[]=1.
		 * @param $options
		 */
		public function Serialize($options = null) {
			$this->CallJqUiMethod("serialize", $options);
		}
		/**
		 * Serializes the sortable's item id's into an array of string. If you have
		 * 
		 * 
		 * &lt;ul id=&quot;a_sortable&quot;&gt;&lt;br&gt;
		 * &lt;li id=&quot;hello&quot;&gt;Hello&lt;/li&gt;&lt;br&gt;
		 * &lt;li id=&quot;goodbye&quot;&gt;Good bye&lt;/li&gt;&lt;br&gt;
		 * &lt;/ul&gt;
		 * 
		 * and do
		 * 
		 * var result = $('#a_sortable').sortable('toArray');
		 * then
		 * 
		 * result[0] will contain &quot;hello&quot; and result[1] will contain
		 * &quot;goodbye&quot;.</p>
		 */
		public function ToArray() {
			$this->CallJqUiMethod("toArray");
		}
		/**
		 * Refresh the sortable items. Custom trigger the reloading of all sortable
		 * items, causing new items to be recognized.
		 */
		public function Refresh() {
			$this->CallJqUiMethod("refresh");
		}
		/**
		 * Refresh the cached positions of the sortables' items. Calling this method
		 * refreshes the cached item positions of all sortables. This is usually done
		 * automatically by the script and slows down performance. Use wisely.
		 */
		public function RefreshPositions() {
			$this->CallJqUiMethod("refreshPositions");
		}
		/**
		 * Cancels a change in the current sortable and reverts it back to how it was
		 * before the current sort started. Useful in the stop and receive callback
		 * functions.
		 * If the sortable item is not being moved from one connected sortable to
		 * another:
		 * 
		 * $(this).sortable('cancel');
		 * will cancel the change.
		 * If the sortable item is being moved from one connected sortable to another:
		 * 
		 * $(ui.sender).sortable('cancel');
		 * will cancel the change. Useful in the 'receive' callback.
		 */
		public function Cancel() {
			$this->CallJqUiMethod("cancel");
		}


		public function __get($strName) {
			switch ($strName) {
				case 'Disabled': return $this->blnDisabled;
				case 'AppendTo': return $this->strAppendTo;
				case 'Axis': return $this->strAxis;
				case 'Cancel': return $this->mixCancel;
				case 'ConnectWith': return $this->mixConnectWith;
				case 'Containment': return $this->mixContainment;
				case 'Cursor': return $this->strCursor;
				case 'CursorAt': return $this->mixCursorAt;
				case 'Delay': return $this->intDelay;
				case 'Distance': return $this->intDistance;
				case 'DropOnEmpty': return $this->blnDropOnEmpty;
				case 'ForceHelperSize': return $this->blnForceHelperSize;
				case 'ForcePlaceholderSize': return $this->blnForcePlaceholderSize;
				case 'Grid': return $this->arrGrid;
				case 'Handle': return $this->mixHandle;
				case 'Helper': return $this->mixHelper;
				case 'Items': return $this->mixItems;
				case 'Opacity': return $this->mixOpacity;
				case 'Placeholder': return $this->strPlaceholder;
				case 'Revert': return $this->mixRevert;
				case 'Scroll': return $this->blnScroll;
				case 'ScrollSensitivity': return $this->intScrollSensitivity;
				case 'ScrollSpeed': return $this->intScrollSpeed;
				case 'Tolerance': return $this->strTolerance;
				case 'ZIndex': return $this->intZIndex;
				default: 
					try { 
						return parent::__get($strName); 
					} catch (QCallerException $objExc) { 
						$objExc->IncrementOffset(); 
						throw $objExc; 
					}
			}
		}

		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				case 'Disabled':
					try {
						$this->blnDisabled = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AppendTo':
					try {
						$this->strAppendTo = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Axis':
					try {
						$this->strAxis = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cancel':
					$this->mixCancel = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'ConnectWith':
					$this->mixConnectWith = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Containment':
					$this->mixContainment = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Cursor':
					try {
						$this->strCursor = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CursorAt':
					$this->mixCursorAt = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Delay':
					try {
						$this->intDelay = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Distance':
					try {
						$this->intDistance = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DropOnEmpty':
					try {
						$this->blnDropOnEmpty = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ForceHelperSize':
					try {
						$this->blnForceHelperSize = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ForcePlaceholderSize':
					try {
						$this->blnForcePlaceholderSize = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Grid':
					try {
						$this->arrGrid = QType::Cast($mixValue, QType::ArrayType);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Handle':
					$this->mixHandle = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Helper':
					$this->mixHelper = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Items':
					$this->mixItems = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Opacity':
					try {
						$this->mixOpacity = QType::Cast($mixValue, 'QJsClosure');
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Placeholder':
					try {
						$this->strPlaceholder = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Revert':
					try {
						$this->mixRevert = QType::Cast($mixValue, 'QJsClosure');
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Scroll':
					try {
						$this->blnScroll = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScrollSensitivity':
					try {
						$this->intScrollSensitivity = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScrollSpeed':
					try {
						$this->intScrollSpeed = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tolerance':
					try {
						$this->strTolerance = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZIndex':
					try {
						$this->intZIndex = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				case 'Enabled':
					$this->Disabled = !$mixValue;	// Tie in standard QCubed functionality
					parent::__set($strName, $mixValue);
					break;
					
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
