<?xml version="1.0"?> 
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/"> 
<HTML>
	<BODY> <P>NOLA BIHURTU XML DOKUMENTUA HTML TAULA BATEAN</P> 

	<TABLE border="1"> 
	<THEAD>
		<TR>
			<TH>Egilea</TH>
			<TH>Enuntziatua</TH>
			<TH>Erantzun zuzena</TH>
		</TR>
	</THEAD> 
	<xsl:for-each select="/GALDERAK/GALDERA" > 
	<TR>
		<TD>
			<xsl:value-of select="@EGILEA"/> <BR/>
		</TD>
		<TD> 
			<xsl:value-of select="GALDERARENTESTUA"/><BR/>
		</TD>
		<TD> 
			<xsl:value-of select="ZUZENA"/><BR/>
		</TD>
	</TR>
	</xsl:for-each>
	</TABLE>
	</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet> 