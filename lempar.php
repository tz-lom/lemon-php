<?php

%%

class Parse {
  private $yyidx = -1;               /* Index of top element in stack */
  private $yyerrcnt;                 /* Shifts left before out of the error */
  private $yystack = array();
  private $yyTraceFILE = null;
  private $yyTracePrompt = null;

%%

%%

%%

  private $YY_NO_ACTION;
  private $YY_ACCEPT_ACTION;
  private $YY_ERROR_ACTION;

  /* action tables */ 

%%

  /* fallback */

  private static $yyFallback = array(
%%
  );

  private static $yyTokenName = array( 
%%
  );

  private static $yyRuleName = array(
%%
  );

  public function trace($TraceFILE, $zTracePrompt)
  {
    $this->yyTraceFILE = $TraceFILE;
    $this->yyTracePrompt = $zTracePrompt;

    if ($yyTraceFILE === null)
      $this->yyTracePrompt = null;
    else if ($yyTracePrompt === null)
      $this->yyTraceFILE = null;
  }

  public function yy_token_name($tokenType)
  {
    if (isset(self::$yyTokenName[$tokenType]))
      return self::$yyTokenName[$tokenType];

    return "Unknown";
  }

  private function yy_destructor($yymajor, $yypminor)
  {
    switch ($yymajor)
    {
%%
      default:  
        break;
    }
  }

  private function yy_pop_parser_stack() 
  {
    if ($this->yyidx < 0) 
      return 0;

    $yytos = $this->yystack[$this->yyidx];

    if ($this->yyTraceFILE) 
      fprintf($this->yyTraceFILE,"%sPopping %s\n", $this->yyTracePrompt, self::$yyTokenName[$yytos->major]);

    $this->yy_destructor( $yytos->major, $yytos->minor);
    unset($this->yystack[$this->yyidx]);
    $this->yyidx--;

    return $yytos->major;
  }

  public function __destruct()
  {
    while($this->yyidx >= 0)
      $this->yy_pop_parser_stack();
  }

  private function yy_find_shift_action($iLookAhead) 
  {
    $i = 0;
    $stateno = $this->yystack[$this->yyidx]->stateno;

    if ($stateno > self::YY_SHIFT_MAX || ($i = self::$yy_shift_ofst[$stateno]) == self::YY_SHIFT_USE_DFLT)
      return self::$yy_default[$stateno];

    if ($iLookAhead == self::YYNOCODE)
      return $this->YY_NO_ACTION;

    $i += $iLookAhead;
    if ($i < 0 || $i >= count(self::$yy_action) || self::$yy_lookahead[$i] != $iLookAhead)
    {
      if ($iLookAhead > 0)
      {
        if (isset(self::$yyFallback[$iLookAhead]) && ($iFallback = self::$yyFallback[$iLookAhead]) != 0) 
        {
          if ($this->yyTraceFILE) 
            fprintf($this->yyTraceFILE, "%sFALLBACK %s => %s\n", $this->yyTracePrompt, self::$yyTokenName[$iLookAhead], self::$yyTokenName[$iFallback]);

          return $this->yy_find_shift_action($iFallback);
        }
        if (defined('Parse::YYWILDCARD'))
        {
          $j = $i - $iLookAhead + self::YYWILDCARD;
          if ($j >= 0 && $j < count(self::$yy_action) && self::$yy_lookahead[$j] == self::YYWILDCARD)
          {
            if ($this->yyTraceFILE) 
              fprintf($this->yyTraceFILE, "%sWILDCARD %s => %s\n", $this->yyTracePrompt, self::$yyTokenName[$iLookAhead], self::$yyTokenName[self::YYWILDCARD]);

            return self::$yy_action[$j];
          }
        }
      }

      return self::$yy_default[$stateno];
    }
    else
      return self::$yy_action[$i];
  }

  private function yy_find_reduce_action($stateno, $iLookAhead)
  {
    $i = 0;

    if ($stateno > self::YY_REDUCE_MAX || ($i = self::$yy_reduce_ofst[$stateno]) == self::YY_REDUCE_USE_DFLT)
      return self::$yy_default[$stateno];

    if ($iLookAhead == self::YYNOCODE)
      return $this->YY_NO_ACTION;

    $i += $iLookAhead;
    if ($i < 0 || $i >= count(self::$yy_action) || self::$yy_lookahead[$i] != $iLookAhead)
      return self::$yy_default[$stateno];

    return self::$yy_action[$i];
  }

  private function yy_shift($yyNewState, $yyMajor, $yypMinor)
  {
    $this->yyidx++;

    if (isset($this->yystack[$this->yyidx])) 
    {
      $yytos = $this->yystack[$this->yyidx];
    } 
    else 
    {
      $yytos = new stdClass;
      $this->yystack[$this->yyidx] = $yytos;
    }

    $yytos->stateno = $yyNewState;
    $yytos->major = $yyMajor;
    $yytos->minor = $yypMinor;

    if ($this->yyTraceFILE) 
    {
      fprintf($this->yyTraceFILE,"%sShift %d\n", $this->yyTracePrompt, $yyNewState);
      fprintf($this->yyTraceFILE,"%sStack:", $this->yyTracePrompt);

      for ($i = 1; $i <= $this->yyidx; $i++) 
      {
        $ent = $this->yystack[$i];
        fprintf($this->yyTraceFILE, " %s", self::$yyTokenName[$ent->major]);
      }

      fprintf($this->yyTraceFILE, "\n");
    }
  }

  private function __overflow_dead_code() 
  {
%%
  }

  private static $yyRuleInfo = array(
%%
  );

  private function yy_reduce($yyruleno)
  {
    $yygoto = 0;              /* The next state */
    $yyact = 0;               /* The next action */
    $yygotominor = null;      /* The LHS of the rule reduced */
    $yymsp = null;            /* The top of the parser's stack */
    $yysize = 0;              /* Amount to pop the stack */

    $yymsp = $this->yystack[$this->yyidx];

    if ($this->yyTraceFILE && isset(self::$yyRuleName[$yyruleno]))
      fprintf($this->yyTraceFILE, "%sReduce [%s].\n", $this->yyTracePrompt, self::$yyRuleName[$yyruleno]);

    switch($yyruleno)
    {
%%
    }

    $yygoto = self::$yyRuleInfo[2 * $yyruleno];
    $yysize = self::$yyRuleInfo[(2 * $yyruleno) + 1];

    $state_for_reduce = $this->yystack[$this->yyidx - $yysize]->stateno;

    $this->yyidx -= $yysize;
    $yyact = $this->yy_find_reduce_action($state_for_reduce,$yygoto);

    if ($yyact < self::YYNSTATE)
      $this->yy_shift($yyact, $yygoto, $yygotominor);
    else if ($yyact == self::YYNSTATE + self::YYNRULE + 1)
      $this->yy_accept();
  }

  private function yy_parse_failed()
  {
    if ($this->yyTraceFILE)
      fprintf($this->yyTraceFILE, "%sFail!\n", $this->yyTracePrompt);

    while ($this->yyidx >= 0) 
      $this->yy_pop_parser_stack();

%%
  }

  private function yy_syntax_error($yymajor, $yyminor)
  {
    $message = 'Unexpected ' . $this->yy_token_name($yymajor) . '(' . $yyminor . ')';
%%
  }

  private function yy_accept()
  {
    if ($this->yyTraceFILE)
      fprintf($this->yyTraceFILE, "%sAccept!\n", $this->yyTracePrompt);

    while ($this->yyidx >= 0) 
      $this->yy_pop_parser_stack();
%%
  }

  private function doParse($yymajor, $yyminor = null) 
  {
    $yyact = 0; /* The parser action. */
    $yyendofinput = 0; /* True if we are at the end of input */
    $yyerrorhit = 0; /* True if yymajor has invoked an error */

    /* (re)initialize the parser, if necessary */
    if ($this->yyidx < 0) 
    {
      $this->yyidx = 0;
      $this->yyerrcnt = - 1;
      $ent = new stdClass;
      $ent->stateno = 0;
      $ent->major = 0;
      $ent->minor = null;
      $this->yystack = array(0 => $ent);
      $this->YY_NO_ACTION = self::YYNSTATE + self::YYNRULE + 2;
      $this->YY_ACCEPT_ACTION = self::YYNSTATE + self::YYNRULE + 1;
      $this->YY_ERROR_ACTION = self::YYNSTATE + self::YYNRULE;
    }

    $yyendofinput = ($yymajor == 0);

    if ($this->yyTraceFILE) 
      fprintf($this->yyTraceFILE, "%sInput %s\n", $this->yyTracePrompt, self::$yyTokenName[$yymajor]);

    do 
    {
      $yyact = $this->yy_find_shift_action($yymajor);

      if ($yyact < self::YYNSTATE) 
      {
        $this->yy_shift($yyact, $yymajor, $yyminor);
        $this->yyerrcnt--;

        if ($yyendofinput && $this->yyidx >= 0) 
          $yymajor = 0;
        else
          $yymajor = self::YYNOCODE;
      } 
      else if ($yyact < self::YYNSTATE + self::YYNRULE) 
      {
        $this->yy_reduce($yyact - self::YYNSTATE);
      }
      else if ($yyact == $this->YY_ERROR_ACTION) 
      {
        if ($this->yyTraceFILE) 
          fprintf($this->yyTraceFILE, "%sSyntax Error!\n", $this->yyTracePrompt);

        if (defined('self::YYERRORSYMBOL')) 
        {
          if ($this->yyerrcnt < 0) 
            $this->yy_syntax_error($yymajor, $yyminor);

          $yymx = $this->yystack[$this->yyidx]->major;

          if ($yymx == self::YYERRORSYMBOL || $yyerrorhit) 
          {
            if ($this->yyTraceFILE) 
              fprintf($this->yyTraceFILE, "%sDiscard input token %s\n", $this->yyTracePrompt, self::$yyTokenName[$yymajor]);

            $this->yy_destructor($yymajor, $yyminor);
            $yymajor = self::YYNOCODE;
          }
          else
          {
            while ($this->yyidx >= 0 && $yymx != self::YYERRORSYMBOL && ($yyact = $this->yy_find_reduce_action($this->yystack[$this->yyidx]->stateno, self::YYERRORSYMBOL)) >= self::YYNSTATE) 
              $this->yy_pop_parser_stack();

            if ($this->yyidx < 0 || $yymajor == 0) 
            {
              $this->yy_destructor($yymajor, $yyminor);
              $this->yy_parse_failed();
              $yymajor = self::YYNOCODE;
            }
            else if ($yymx != self::YYERRORSYMBOL) 
            {
              $this->yy_shift($yyact, self::YYERRORSYMBOL, 0);
            }
          }

          $yypParser->yyerrcnt = 3;
          $yyerrorhit = 1;
        }
        else
        { 
          if ($this->yyerrcnt <= 0) 
            $this->yy_syntax_error($yymajor, $yyminor);

          $this->yyerrcnt = 3;
          $this->yy_destructor($yymajor, $yyminor);

          if ($yyendofinput) 
            $this->yy_parse_failed();

          $yymajor = self::YYNOCODE;
        }
      }
      else
      {
        $this->yy_accept();
        $yymajor = self::YYNOCODE;
      }
    }
    while ($yymajor != self::YYNOCODE && $this->yyidx >= 0);
  }
}

?>
